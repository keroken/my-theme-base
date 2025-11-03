<?php

// Basic setup
function mytheme_setup() {
  // Add title tag support
  add_theme_support('title-tag');

  // Add post thumbnail support
  add_theme_support('post-thumbnails');

  // Add custom menu support
  register_nav_menus([
    'primary' => 'Primary Menu',
    'supporter' => 'Supporter Menu',
  ]);
}
add_action('after_setup_theme', 'mytheme_setup');

// SEO Meta Tags Function
function mytheme_seo_meta_tags() {
  global $post;

  // Default values
  $title = get_bloginfo('name');
  $description = get_bloginfo('description');
  $keywords =
    'international students canada, ISMC, international student ministry, christian ministry canada, student outreach, international student support, canada student ministry, christian international students, student ministry canada, international student christian fellowship';
  $url = home_url();
  $image = get_template_directory_uri() . '/images/ISMC_primary_logo.png';

  // Page/post specific meta
  if (is_front_page()) {
    $title = get_bloginfo('name') . ' - International Student Ministry Canada';
    $description =
      'International Student Ministry Canada empowers international students to impact the world through Jesus Christ.';
  } elseif (is_single() || is_page()) {
    if (has_excerpt()) {
      $description = get_the_excerpt();
    } else {
      $description = wp_trim_words(get_the_content(), 25, '...');
    }

    if (has_post_thumbnail()) {
      $image = get_the_post_thumbnail_url(get_the_ID(), 'large');
    }

    $title = get_the_title() . ' - ' . get_bloginfo('name');
    $url = get_permalink();
  } elseif (is_home()) {
    $title = get_bloginfo('name') . ' - International Student Ministry Canada';
    $description =
      'ISMC (International Student Ministry Canada) serves international students across Canada with Christian hospitality, friendship, and spiritual support. Join our community of international students and volunteers.';
  } elseif (is_category()) {
    $title = single_cat_title('', false) . ' - ' . get_bloginfo('name');
    $description = category_description();
  } elseif (is_tag()) {
    $title = single_tag_title('', false) . ' - ' . get_bloginfo('name');
    $description = tag_description();
  }

  // Clean up description
  $description = wp_strip_all_tags($description);
  $description = str_replace(["\n", "\r", "\t"], ' ', $description);
  $description = preg_replace('/\s+/', ' ', $description);
  $description = trim($description);

  // Ensure description isn't too long (ideal length: 150-160 characters)
  if (strlen($description) > 160) {
    $description = substr($description, 0, 157) . '...';
  }

  // Output meta tags
  echo "\n<!-- SEO Meta Tags -->\n";

  // Basic meta tags
  echo '<meta name="description" content="' .
    esc_attr($description) .
    '">' .
    "\n";
  echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";
  echo '<meta name="author" content="' .
    esc_attr(get_bloginfo('name')) .
    '">' .
    "\n";
  echo '<meta name="robots" content="index, follow">' . "\n";

  // Open Graph meta tags
  echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
  echo '<meta property="og:description" content="' .
    esc_attr($description) .
    '">' .
    "\n";
  echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
  echo '<meta property="og:site_name" content="' .
    esc_attr(get_bloginfo('name')) .
    '">' .
    "\n";
  echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
  echo '<meta property="og:image:width" content="1200">' . "\n";
  echo '<meta property="og:image:height" content="630">' . "\n";
  echo '<meta property="og:type" content="' .
    (is_single() ? 'article' : 'website') .
    '">' .
    "\n";
  echo '<meta property="og:locale" content="en_CA">' . "\n";

  // Twitter Card meta tags
  echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
  echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
  echo '<meta name="twitter:description" content="' .
    esc_attr($description) .
    '">' .
    "\n";
  echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";

  // Additional SEO meta tags
  echo '<meta name="geo.region" content="CA">' . "\n";
  echo '<meta name="geo.placename" content="Canada">' . "\n";
  echo '<meta name="language" content="English">' . "\n";
  echo '<meta name="distribution" content="global">' . "\n";
  echo '<meta name="rating" content="general">' . "\n";

  // Canonical URL
  echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";

  echo "<!-- End SEO Meta Tags -->\n";
}

// widget area
function mytheme_widgets() {
  register_sidebar([
    'name' => 'Sidebar',
    'id' => 'sidebar-1',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
  ]);
}
add_action('widgets_init', 'mytheme_widgets');

// Styles and scripts
function mytheme_enqueue() {
  // Styles
  wp_enqueue_style('mytheme-style', get_stylesheet_uri(), [], date('U'));
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue');

// Preload critical resources for LCP optimization
function mytheme_preload_critical_resources() {
  if (is_front_page()) {
    $theme_uri = get_template_directory_uri();

    // Preload hero image in WebP format (CSS handles JPG fallback for older browsers)
    // This is the main hero image that appears above the fold
    echo '<link rel="preload" as="image" href="' .
      $theme_uri .
      '/images/hero-image.webp" type="image/webp" fetchpriority="high">' .
      "\n";
  }
}
add_action('wp_head', 'mytheme_preload_critical_resources', 1);

// Add WebP detection script for better image optimization
function mytheme_webp_detection() {
  ?>
  <script>
    (function() {
      function supportsWebP(callback) {
        var webP = new Image();
        webP.onload = webP.onerror = function () {
          callback(webP.height == 2);
        };
        webP.src = "data:image/webp;base64,UklGRjoAAABXRUJQVlA4IC4AAACyAgCdASoCAAIALmk0mk0iIiIiIgBoSygABc6WWgAA/veff/0PP8bA//LwYAAA";
      }
      
      supportsWebP(function(supported) {
        if (supported) {
          document.documentElement.classList.add('webp');
        } else {
          document.documentElement.classList.add('no-webp');
        }
      });
    })();
  </script>
  <?php
}
add_action('wp_head', 'mytheme_webp_detection', 0);

function front_page_custom_javascript() {
  ?>
      <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', () => {
          const overlay = document.querySelector('.overlay');

          // Add fade in effect when elements enter viewport
          const fadeElements = document.querySelectorAll(".fade");
          
          // Get section-stories and its children to exclude from general observer
          const sectionStories = document.querySelector(".section-stories");
          const sectionStoriesElements = sectionStories ? 
              [sectionStories, ...sectionStories.querySelectorAll(".fade")] : [];

          const observerOptions = {
              root: null,
              rootMargin: '0px',
              threshold: 0.1 // Trigger when 10% of element is visible
          };

          const fadeObserver = new IntersectionObserver((entries, observer) => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      entry.target.classList.add("fadeIn");
                      observer.unobserve(entry.target); // Stop observing once animated
                  }
              });
          }, observerOptions);

          // Observe all fade elements except section-stories and its children
          fadeElements.forEach(element => {
              if (!sectionStoriesElements.includes(element)) {
                  fadeObserver.observe(element);
              }
          });

          // Specific observer for section-stories to trigger animation earlier
          if (sectionStories) {
              const storiesObserverOptions = {
                  root: null,
                  rootMargin: '200px 0px', // Trigger when element is 200px away from viewport
                  threshold: 0 // Trigger as soon as any part is about to enter
              };

              const storiesObserver = new IntersectionObserver((entries, observer) => {
                  entries.forEach(entry => {
                      if (entry.isIntersecting) {
                          entry.target.classList.add("fadeIn");
                          observer.unobserve(entry.target);
                      }
                  });
              }, storiesObserverOptions);

              // Observe section-stories and all nested fade elements with early trigger
              sectionStoriesElements.forEach(element => {
                  storiesObserver.observe(element);
              });
          }
      });

      class ParallaxEffectBackground {
          constructor() {
              this.devided = 2;
              this.target = '.move-target';
              this.setBackgroundPosition();
          }

          getScrollTop() {
              return Math.max(
              window.pageYOffset,
              document.documentElement.scrollTop,
              document.body.scrollTop,
              window.scrollY
              );
          }

          setBackgroundPosition() {
              document.addEventListener('scroll', e => {
              const scrollTop = this.getScrollTop();
              const position = scrollTop / this.devided - 60;
              if (position) {
                  document.querySelectorAll(this.target).forEach(element => {
                  element.style.backgroundPosition = 'center top +' + position + 'px';
                  });
              }
              });
          }
      
      }
      document.addEventListener('DOMContentLoaded', event => {
          new ParallaxEffectBackground();
      });
      </script>
  <?php
}
add_action('wp_head', function () {
  if (is_front_page()) {
    front_page_custom_javascript();
  }
});

function find_out_page_custom_javascript() {
  ?>
      <script type="text/javascript">
      document.addEventListener('DOMContentLoaded', () => {
          const overlay = document.querySelector('.overlay');
          const storyModal = document.querySelector('.story-modal');
          const storyTitle = document.getElementById('story-title');
          const storyImage = document.getElementById('story-image');
          const storyContent = document.getElementById('story-content');

          const closeButton = document.querySelector('.close-button');
          const closeButtonBottom = document.querySelector('.close-button-bottom');

          const storyButton01 = document.getElementById('story-button-01');
          const storyButton02 = document.getElementById('story-button-02');
          const storyButton03 = document.getElementById('story-button-03');
          const storyButton04 = document.getElementById('story-button-04');
          const storyButton05 = document.getElementById('story-button-05');

          // Check if elements exist
          if (!storyModal) {
              return;
          }
          
          if (!storyTitle || !storyImage || !storyContent) {
              return;
          }

          const getStory = (storyNumber) => {
              let content = {
                  name: '',
                  photo: '',
                  text: '',
              };
              switch (storyNumber) {
                  case '01':
                      content.name = 'Charlie';
                      content.photo = 'Charlie.jpg';
                      content.text = 'Charlie grew up in a Christian family in China, but his faith felt like a checklist of duties and rules to follow: \“God had always been like a customer service line for me—I only prayed to Him when I needed something. It wasn\'t until my four years in college that I began to experience His work and calling upon me and to have a personal relationship with Him.\”'+'<br /><br />'+'When Charlie arrived in Canada, he found adjusting to life as an international student difficult—especially dealing with loneliness, low self-esteem and the feeling of not belonging. He learned about his university\'s ISMC-sponsored club at a church event, and soon became a discussion facilitator— and then the student president.'+'<br /><br />'+'\“I felt welcomed and recognized in the ISMC community. There was also the sense of accomplishment; I got to work with so many wonderful and warm-hearted people and see how I could help make a difference. I never imagined I would be the leader of an international student club. That\'s why being part of ISMC turned out to be such an unexpectedly inspiring experience in my faith journey. It helped me see the impact I can make with God\'s guidance and calling, and discover potential that I never knew God had given me.\”';
                      return content;
                      break;
                  case '02':
                      content.name = 'Alex';
                      content.photo = 'Alex.jpg';
                      content.text = 'For Alex it was all about the food. Free food got him curious enough to check out an ISMC event, and free food kept him coming back. \“As an international student who wasn\'t very experienced in cooking, having meals provided made life a lot easier.\”'+'<br /><br />'+'Beyond that, it was also about meeting new people, making friends, and getting to practice English in a comfortable environment. Alex felt isolated because of his struggle to communicate in English. \“So it started with the food,\” he says, \“but it was really the community and the chance to improve my English too.\”'+'<br /><br />'+'After attending monthly dinners for a while, Alex heard about an Alpha event. Alex knew there would be discussion about Christianity—and free food. So he figured he\'d go to meet people and share his own views.'+'<br /><br />'+'\“I thought I could help others see things in a more scientific way,\” explains Alex, \“because I believed religion was outdated. Coming from an atheist perspective and having a background in Islam, I thought all religions were kind of the same and, honestly, not something I needed.'+'<br /><br />'+'\”But the more Alex got to know about Jesus and Christianity, the more he realized it was fundamentally different from what he expected. \“I came to see a loving, humble God who considers us his children, and it was one of the biggest transformations in my life.\”'+'<br /><br />'+'\“So that\'s how I came to know Christ,\” says Alex. \“Through these open conversations, realizing the differences, and seeing that Christianity was the light I wanted to follow. Having a relationship with God, my Father God and our Lord Jesus Christ, has given me someone to turn to in difficult times. And now I have a whole family of Christian brothers and sisters who I love and who love me back.\”';
                      return content;
                      break;
                  case '03':
                      content.name = 'Naya';
                      content.photo = 'Naya.jpg';
                      content.text = 'When Naya came to Canada, it was her first time ever living on her own, and it was in a completely new country and culture, so different from her tropical Mauritius. She first heard about ISMC as the weather was getting colder: a fellow student mentioned an upcoming winter clothing event that ISMC was hosting, and Naya decided to check it out. \“It turned out to be one of the best decisions I made in the first few months of my time in Canada,\” she shares.'+'<br /><br />'+'Naya got a thick winter jacket, essential for surviving that first Canadian winter. But she also got so much more: she discovered all sorts of ISMC activities and events, and in the process, she discovered a community.'+'<br /><br />'+'\“It was good knowing that there were people here looking out for international students like me,\” says Naya. \“The ISMC volunteers and organizers made an effort to create a space that felt safe, encouraging, and open - whether we were enjoying a meal together, playing board games, going on outdoor trips, or engaging in deeper conversations about life and spirituality.\”'+'<br /><br />'+'Naya was drawn to ISMC\'s discussion groups, where she felt seen and heard, and could explore life and faith in an open way. \“Exploring deeper questions about life and spirituality wasn\'t completely new to me,\” explains Naya, \“however, attending the ISMC events gave me more time and space to revisit those questions in a different context, especially after moving to a new country and navigating significant life changes. Each of these activities helped me better reflect on myself and allowed me to grow personally, spiritually, and socially.\”'+'<br /><br />'+'\“Thank you,” says Naya, \“I\'m thankful for all the ways that ISMC has made my journey in Canada - from international student to graduate - happier, easier, and more meaningful.\”';
                      return content;
                      break;
                  default:
                      content = {
                          name: '',
                          photo: '',
                          text: '',
                      };
              };
          };

          const openModal = (storyNumber) => {
              const story = getStory(storyNumber);
              storyTitle.innerHTML = `${story.name}'s Story`;
              storyImage.src = `<?php echo esc_url(
                home_url('/'),
              ); ?>wp-content/themes/my-theme-base/images/${story.photo}`;
              storyContent.innerHTML = story.text;
              
              storyModal.showModal();
              storyModal.classList.add('show-modal');
              
              if (overlay) {
                  overlay.style.display = 'block';
              }
              document.documentElement.style.overflow = "hidden";
          };

          const closeModal = () => {
              storyModal.close();
              storyModal.classList.remove('show-modal');
              if (overlay) {
                  overlay.style.display = "none";
              }
              document.documentElement.removeAttribute("style");
          };

          // Add event listeners for story buttons
          if (storyButton01) {
              storyButton01.addEventListener('click', () => {
                  openModal('01');
              });
          }

          if (storyButton02) {
              storyButton02.addEventListener('click', () => {
                  openModal('02');
              });
          }

          if (storyButton03) {
              storyButton03.addEventListener('click', () => {
                  openModal('03');
              });
          }

          if (storyButton04) {
              storyButton04.addEventListener('click', () => {
                  openModal('04');
              });
          }

          if (storyButton05) {
              storyButton05.addEventListener('click', () => {
                  openModal('05');
              });
          }

          // Add event listeners for close buttons
          if (closeButton) {
              closeButton.addEventListener('click', closeModal);
          }

          if (closeButtonBottom) {
              closeButtonBottom.addEventListener('click', closeModal);
          }

          // Close modal when clicking outside
          storyModal.addEventListener('click', (event) => {
              if (event.target.closest('#dialogInputArea') === null) {
                  closeModal();
              }
          });
      });
      </script>
  <?php
}
add_action('wp_head', function () {
  if (is_page('about-volunteer')) {
    find_out_page_custom_javascript();
  }
});

function header_custom_javascript() {
  ?>
      <script type="text/javascript">
          window.addEventListener('load', () => {
              const hamburgerButton = document.getElementById('hamburger-button');
              const closeMenuButton = document.getElementById('close-menu-button');
              const mobileMenuContainer = document.getElementById('mobile-menu-container');
              const navWrapper = document.querySelector('.primary-menu-wrapper');
              hamburgerButton.addEventListener('click', () => {
                  if (mobileMenuContainer) {
                      mobileMenuContainer.classList.toggle('show-menu');
                  }
                  navWrapper.classList.toggle('justify-content-start');
                  hamburgerButton.classList.toggle('show-menu');
                  closeMenuButton.classList.toggle('show-menu');
              });

              closeMenuButton.addEventListener('click', () => {
                  if (mobileMenuContainer) {
                      mobileMenuContainer.classList.toggle('show-menu');
                  }
                  navWrapper.classList.toggle('justify-content-start');
                  hamburgerButton.classList.toggle('show-menu');
                  closeMenuButton.classList.toggle('show-menu');
              });
          });

          window.addEventListener('scroll', function() {
              const siteHeader = document.getElementById('site-header');
              const mobileMenuContainer = document.getElementById('mobile-menu-container');
              if (window.pageYOffset > 0) {
                  siteHeader.classList.add('scrolled');
                  if (mobileMenuContainer) {
                      mobileMenuContainer.classList.add('scrolled');
                  }
              } else {
                  siteHeader.classList.remove('scrolled');
                  if (mobileMenuContainer) {
                      mobileMenuContainer.classList.remove('scrolled');
                  }
              }
          });
      </script>
  <?php
}
add_action('wp_head', 'header_custom_javascript');

function story_page_custom_javascript() {
  ?>
      <script type="text/javascript">
        window.addEventListener('load', () => {
          const overlay = document.querySelector('.overlay');

          const storyDialogs = document.querySelectorAll('.story-modal');

          const closeButtons = document.querySelectorAll('.close-button');
          const closeButtonBottoms = document.querySelectorAll('.close-button-bottom');

          const storyButtons = document.querySelectorAll('.story-button');
          const readMoreButtons = document.querySelectorAll('.read-more-button');

          const openDialog = (index) => {
            storyDialogs[index].showModal();
            storyDialogs[index].classList.add('show-modal');
            if (overlay) {
              overlay.style.display = 'block';
            }
            document.documentElement.style.overflow = "hidden";
          };

          storyButtons.forEach((storyButton, index) => {
            storyButton.addEventListener('click', () => {
              openDialog(index);
            });
          });

          readMoreButtons.forEach((readMoreButton, index) => {
            readMoreButton.addEventListener('click', () => {
              openDialog(index);
            });
          });

          closeButtons.forEach((closeButton, index) => {
            closeButton.addEventListener('click', () => {
              storyDialogs[index].close();
              if (overlay) {
                overlay.style.display = "none";
              }
              storyDialogs[index].classList.remove('show-modal');
              document.documentElement.removeAttribute("style");
            });
          });

          closeButtonBottoms.forEach((closeButtonBottom, index) => {
            closeButtonBottom.addEventListener('click', () => {
              storyDialogs[index].close();
              if (overlay) {
                overlay.style.display = "none";
              }
              storyDialogs[index].classList.remove('show-modal');
              document.documentElement.removeAttribute("style");
            });
          });

          storyDialogs.forEach((storyDialog, index) => {
            storyDialog.addEventListener('click', (event) => {
              if (event.target.closest('[id^="dialogInputArea"]') === null) {
                storyDialogs[index].close();
                if (overlay) {
                  overlay.style.display = "none";
                }
                storyDialogs[index].classList.remove('show-modal');
                document.documentElement.removeAttribute("style");
              }
            });
          });

        });
      </script>
  <?php
}
add_action('wp_head', function () {
  if (is_page('learn')) {
    story_page_custom_javascript();
  }
});

function find_your_city_map_functionality() {
  // Enqueue Leaflet CSS and JS
  wp_enqueue_style(
    'leaflet-css',
    'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
    [],
    '1.9.4',
  );
  wp_enqueue_script(
    'leaflet-js',
    'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
    [],
    '1.9.4',
    true,
  );// Add the map JavaScript
  ?>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
      // Initialize the map
      const map = L.map('canada-map', {
          zoomControl: true,
          minZoom: 4,
          maxZoom: 19
      });
      
      // Add the tile layer (OpenStreetMap)
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '© OpenStreetMap contributors',
          maxZoom: 19
      }).addTo(map);

      // City data
      const cities = [
          // British Columbia
          {
              name: 'Victoria',
              lat: 48.4284,
              lng: -123.3656,
              staff_name: 'Sandi Mcdougall',
              email: 'sandi.mcdougall@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Vancouver',
              lat: 49.2827,
              lng: -123.1207,
              staff_name: 'Izumi Araki',
              email: 'izumi.araki@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Surrey',
              lat: 49.1913,
              lng: -122.8490,
              staff_name: 'Jessica Mamouler',
              email: 'jessica.mamouler@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Kelowna',
              lat: 49.8877,
              lng: -119.4960,
              staff_name: 'Rick Wilgosh',
              email: 'rick.wilgosh@ismc.ca',
              website: '',
              social: {
                  facebook: 'https://www.facebook.com/utalkspage/',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Kamloops',
              lat: 50.6745,
              lng: -120.3273,
              staff_name: 'Jeff Torrans',
              email: 'jeff.torrans@ismc.ca',
              website: '',
              social: {
                  facebook: 'https://www.facebook.com/groups/FocusClubTRU/',
                  twitter: '',
                  instagram: ''
              }
          },
          // Alberta
          {
              name: 'Calgary',
              lat: 51.0447,
              lng: -114.0719,
              staff_name: 'Cleuber De Sousa',
              email: 'cleuber.desousa@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Edmonton',
              lat: 53.5461,
              lng: -113.4938,
              staff_name: 'Gary Short',
              email: 'gary.short@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          // Saskatchewan
          {
              name: 'Regina',
              lat: 50.4452,
              lng: -104.6189,
              staff_name: 'Leighton Gust',
              email: 'leighton.gust@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Saskatoon',
              lat: 52.1332,
              lng: -106.6700,
              staff_name: 'Cam Janzen',
              email: 'cam.janzen@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          // Manitoba
          {
              name: 'Winnipeg',
              lat: 49.8951,
              lng: -97.1384,
              staff_name: 'Frieda Martens',
              email: 'frieda.martens@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          // Ontario
          {
              name: 'Kitchener-Waterloo',
              lat: 43.4516,
              lng: -80.4925,
              staff_name: 'Dorothy Tam',
              email: 'dorothy.tam@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Guelph',
              lat: 43.5448,
              lng: -80.2482,
              staff_name: 'Karen Ting',
              email: '',
              website: 'https://www.guelphinternationalstudents.com',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: 'https://www.instagram.com/guelphinternationalstudents/'
              }
          },
          {
              name: 'Hamilton',
              lat: 43.5890,
              lng: -79.6441,
              staff_name: 'Peter Scholtens',
              email: '',
              website: 'https://events.helpinginternationalstudents.com/hamilton',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: 'https://www.instagram.com/hamiltoninternationalstudents/'
              }
          },
          {
              name: 'Brantford',
              lat: 43.1394,
              lng: -80.2644,
              staff_name: 'Jason Keuning',
              email: 'jason.keuning@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'London',
              lat: 42.9849,
              lng: -81.2453,
              staff_name: 'Stuart Smith',
              email: '',
              website: 'https://www.londoninternationalstudents.com',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: 'https://www.instagram.com/london_international_students/'
              }
          },
          {
              name: 'Niagara',
              lat: 43.0896,
              lng: -79.0849,
              staff_name: 'Hilda Vanderklippe',
              email: '',
              website: 'https://www.niagarainternationalstudents.com',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: 'https://www.instagram.com/niagarainternationalstudents/'
              }
          },
          {
              name: 'Toronto',
              lat: 43.6532,
              lng: -79.3832,
              staff_name: 'Pin Wong',
              email: '',
              website: 'https://events.helpinginternationalstudents.com/toronto',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          {
              name: 'Ottawa',
              lat: 45.4215,
              lng: -75.6972,
              staff_name: 'Vinu Rajus',
              email: 'vinu.rajus@ismc.ca',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          },
          // Quebec
          {
              name: 'Montreal',
              lat: 45.5017,
              lng: -73.5673,
              staff_name: 'Belinda Tam',
              email: '',
              website: 'https://www.montrealinternationalstudents.com/',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: 'https://www.instagram.com/internationalstudentsmontreal'
              }
          },
          {
              name: 'Sherbrooke',
              lat: 45.4000,
              lng: -71.8990,
              staff_name: 'Andrey Cañas',
              email: '',
              website: '',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: 'https://www.instagram.com/sherbrooke.int.students/'
              }
          },
          // Nova Scotia
          {
              name: 'Halifax',
              lat: 44.6488,
              lng: -63.5752,
              staff_name: 'Chi Perrie',
              email: '',
              website: 'https://ismchalifax.ca/',
              social: {
                  facebook: '',
                  twitter: '',
                  instagram: ''
              }
          }
      ];

      // Create a layer group for all markers
      const markers = L.layerGroup().addTo(map);

      // Add markers for each city and collect their bounds
      const bounds = L.latLngBounds([]);
      cities.forEach(city => {
          const marker = L.marker([city.lat, city.lng])
              .bindPopup(city.name);
          markers.addLayer(marker);
          
          // Add marker position to bounds
          bounds.extend([city.lat, city.lng]);

          marker.on('click', function() {
              showCityInfo(city);
          });
      });

      // Fit the map to show all markers with some padding
      map.fitBounds(bounds, {
          padding: [50, 50], // Add padding around the bounds
          maxZoom: 6 // Limit the maximum zoom level when fitting bounds
      });

      function showCityInfo(city) {
          const cityInfo = document.getElementById('city-info');
          
          let contactInfo = '';
          if (city.staff_name) {
              contactInfo += `<p><strong>Staff:</strong> ${city.staff_name}</p>`;
          }
          if (city.email) {
              contactInfo += `<p><strong>Email:</strong> <a href="mailto:${city.email}">${city.email}</a></p>`;
          }
          if (city.website) {
              contactInfo += `<p><strong>Website:</strong> <a href="${city.website}" target="_blank">${city.website}</a></p>`;
          }
          
          let socialLinks = '';
          if (city.social.facebook) {
              socialLinks += `<a href="${city.social.facebook}" target="_blank">Facebook</a>`;
          }
          if (city.social.twitter) {
              socialLinks += `<a href="${city.social.twitter}" target="_blank">Twitter</a>`;
          }
          if (city.social.instagram) {
              socialLinks += `<a href="${city.social.instagram}" target="_blank">Instagram</a>`;
          }
          
          cityInfo.innerHTML = `
              <div class="city-details active">
                  <h3>${city.name}</h3>
                  ${contactInfo ? `<div class="contact-info">${contactInfo}</div>` : ''}
                  ${socialLinks ? `<div class="social-links">${socialLinks}</div>` : ''}
              </div>
          `;
      }
  });
  </script>
  <?php
}

// Hook the map functionality to wp_head for pages that need it
add_action('wp_head', function () {
  if (is_page('find-your-city') || is_page('volunteer')) {
    find_your_city_map_functionality();
  }
});
