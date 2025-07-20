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
  if (is_single() || is_page()) {
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

function front_page_custom_javascript() {
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
                      content.name = 'Hatsumi';
                      content.photo = 'Hatsumi_01.jpg';
                      content.text = 'The Holy Spirit\'s promptings convinced me that we should invite this 25-year-old Japanese student home for lunch - even though home was a mess due to our impending move! While I washed dishes, I saw Hatsumi on the couch "devouring" the New Testament I had been impressed to give her moments earlier. This led very naturally to conversation about my Lord Jesus. Surrounded by packing boxes, Hatsumi tearfully asked Jesus to be her Lord. On July 25, I was privileged to baptize her, and her friends and fellow students witnessed this. "Now I\'m not afraid of living! Now God is very close. I think I wanted to be loved but our love has a limit. God\'s love is a big love!" Hatsumi came to Canada from the "land of the rising sun" and returned to Japan as a permanent resident of the Kingdom of the Risen Son!'+'<br /><br />'+'(from Hatsumi\'s Story, as shared by the ISMC Victoria City Director in Doorways Feb 1994)';
                      return content;
                      break;
                  case '02':
                      content.name = 'Vinu';
                      content.photo = 'Vinu_01.jpg';
                      content.text = 'I moved to Vancouver to pursue my PhD at SFU. Through my church, The Point, I was introduced to the FOCUS Club at SFU, Burnaby. As an international student in Canada, the FOCUS Club at SFU has been a wonderful place to enjoy and experience love through various activities such as hiking, baking, and learning to cook different ethnic foods. Being away from home can be lonely, especially during the holiday seasons. The FOCUS Club has not only provided new friendships but also supported me during my lonely times through activities hosted by families. They are my extended family here.'+'<br /><br />'+'As a Christian, I have enjoyed the various discipleship teachings the club offered. Eventually, I joined to co-lead the club at SFU Surrey and had a completely new experience in sharing the word with non-believers. I felt led to do the same in Ottawa. Students need to know more about God, especially in today\'s world where they need God\'s love more than anything. Hence, when an opportunity arose, I joined ISMC to start international outreach in Ottawa, hoping to spread the love and care I received through ISMC to other international students.'+'<br /><br />'+'Happy 40th Anniversary, ISMC, and thank you for making the experience of international students memorable.'+'<br /><br />'+'(from a story shared by Vinu Rajus)';
                      return content;
                      break;
                  case '03':
                      content.name = 'Yan';
                      content.photo = 'Yan_01.jpg';
                      content.text = 'In China, I often pondered spiritual questions. To know, "Who am I?" "Why am I here?" were very important to me. One day while in Vancouver, I met a Taiwanese Christian lady. She invited me to Bible study and when I began reading the Bible, I found what I had been seeking. But I just added the Bible to my Buddhism books. Then one day when I was praying, God said to me, "Christianity is being saved by salvation, but Buddhism is by saving yourself." It was like a light turned on in my heart! At that moment, I became a believer in Christ. Many students now come to me with the same questions I had when I arrived in North America. What a joy to point them to Jesus Christ, the same Answer I found!'+'<br /><br />'+'(from Yan Bin\'s story, as shared in Doorways 1995 Vol. 2)';
                      return content;
                      break;
                  case '04':
                      content.name = 'Mindy';
                      content.photo = 'Mindy_01.jpg';
                      content.text = 'My name is Mindy Seto and I am originally from Hong Kong. Five years ago I was invited to FOCUS at the home of ISMC staff. I had never been in a Canadian home before. I was introduced to turkey and stuffing, waffles, and brownies. I found love, met Christians, international friends, and, most importantly, my Lord Jesus Christ.'+'<br /><br />'+'(from Mindy\'s Story, as shared in Doorways 2001 Vol. 2)';
                      return content;
                      break;
                  case '05':
                      content.name = 'Kenji';
                      content.photo = 'Kenji_01.jpg';
                      content.text = 'My name is Kenji Kondo, from Japan. My family is very traditional Buddhist and Shintoist. As an atheist, I was against any religion. I came to Canada in 1995.'+'<br /><br />'+
          'That\'s how Kenji started his testimony at an ISMC banquet in 2001, just two years after going forward at the altar call of a Japanese evangelist speaking in Calgary. So how did Kenji come to accept Jesus? And what has happened since?'+'<br /><br />'+
          'God brought loving Christians into Kenji\'s life while he was a student. He stayed at the home of ISMC staff, attended FOCUS Club and even Bible study. But, as a staunch atheist, he was determined not to become a Christian himself, even though Christians served and prayed for him. Kenji was amazed that anyone would pray for his struggles—and even more amazed that they believed and trusted that their God would help him. "And it was so," said Kenji. By the time he spoke at that 2001 banquet, he had become a believer, been baptized, and was serving in Canada with Wycliffe Bible Translators.'+'<br /><br />'+
          'Kenji had no intention of returning to Japan. In 2005, he married a Canadian. Later, his family even served for two years in Asia. But God was nudging Kenji about friends and family in Japan, not one of whom knew about Jesus. There had never been a church in his hometown, and no missionaries had ever come to the place.'+'<br /><br />'+
          'In 2012, Kenji\'s father\'s failing health forced the issue. Almost fifteen years after becoming a Christian, Kenji moved back to his hometown to take care of his dad. A few years later, Kenji\'s dad miraculously accepted Jesus and was baptized before he passed away. This sparked a desire in Kenji to minister to his own people, and laid the foundation for Kenji and Sandy to join Operation Mobilization, starting a new ministry team in Japan. They served in evangelism and also started a gathering of believers.'+'<br /><br />'+
          'Today, in Kenji\'s hometown, there is a church plant started by one of the major denominations in Japan. Kenji and his family support Japanese pastors and struggling churches and work to break denominational and geographical barriers throughout his province of Mie. Kenji speaks and interprets at local and international events—including the once-in-sevenyear conference presented by the Japanese Evangelical Association.'+'<br /><br />'+ 
          'When a series of large earthquakes hit the Noto Peninsula this January, 360 kilometers north of Kenji\'s home, Operation Mobilization was quick to help. Kenji\'s coworkers in the affected region became the first to respond, while Kenji was appointed disaster response manager. He kept churches and relief organizations updated, while Operation Mobilization gathered with local pastors and denominations to start Noto Help, an interdenominational Christian disaster response organization.'+'<br /><br />'+
          'That student, who was determined not to become a Christian or return to Japan, now prays that this ongoing relief effort will open doors for churches to have unity and for Christians to become salt and light in Japan.';
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

          // Add fade in effect
          const elementsArray = document.querySelectorAll(".fade");
          for (let i = 0; i < elementsArray.length; i++) {
              elementsArray[i].classList.add("fadeIn");
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

add_action('wp_head', function () {
  if (is_page('find-out')) {
    front_page_custom_javascript();
  }
});

add_action('wp_head', function () {
  if (is_page('learn')) {
    front_page_custom_javascript();
  }
});

function header_custom_javascript() {
  ?>
      <script type="text/javascript">
          window.addEventListener('load', () => {
              const hamburgerButton = document.getElementById('hamburger-button');
              const closeMenuButton = document.getElementById('close-menu-button');
              const primaryMenu = document.getElementById('primary-menu');
              const navWrapper = document.querySelector('.primary-menu-wrapper');
              hamburgerButton.addEventListener('click', () => {
                  primaryMenu.classList.toggle('show-menu');
                  navWrapper.classList.toggle('justify-content-start');
                  hamburgerButton.classList.toggle('show-menu');
                  closeMenuButton.classList.toggle('show-menu');
              });

              closeMenuButton.addEventListener('click', () => {
                  primaryMenu.classList.toggle('show-menu');
                  navWrapper.classList.toggle('justify-content-start');
                  hamburgerButton.classList.toggle('show-menu');
                  closeMenuButton.classList.toggle('show-menu');
              });
          });

          window.addEventListener('scroll', function() {
              const siteHeader = document.getElementById('site-header');
              const primaryMenu = document.getElementById('primary-menu');
              if (window.pageYOffset > 0) {
                  siteHeader.classList.add('scrolled');
                  primaryMenu.classList.add('scrolled');
              } else {
                  siteHeader.classList.remove('scrolled');
                  primaryMenu.classList.remove('scrolled');
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
            overlay.style.display = 'block';
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
              storyDialogs.forEach((storyDialog) => {
                storyDialogs[index].close();
                overlay.style.display = "none";
                storyDialogs[index].classList.remove('show-modal');
                document.documentElement.removeAttribute("style");
              });
            });
          });

          closeButtonBottoms.forEach((closeButtonBottom, index) => {
            closeButtonBottom.addEventListener('click', () => {
              storyDialogs.forEach((storyDialog) => {
                storyDialogs[index].close();
                overlay.style.display = "none";
                storyDialogs[index].classList.remove('show-modal');
                document.documentElement.removeAttribute("style");
              });
            });
          });

          storyDialogs.forEach((storyDialog, index) => {
            storyDialog.addEventListener('click', (event) => {
              if (event.target.closest('#dialogInputArea') === null) {
                storyDialogs[index].close();
                overlay.style.display = "none";
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
  if (is_home()) {
    story_page_custom_javascript();
  }
});
