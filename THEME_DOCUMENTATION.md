# My Theme BASE - WordPress Theme Documentation

## Table of Contents
1. [Theme Overview](#theme-overview)
2. [File Structure](#file-structure)
3. [Key Features](#key-features)
4. [Template Hierarchy](#template-hierarchy)
5. [Core Functions](#core-functions)
6. [Data Management](#data-management)
7. [Styling & Design System](#styling--design-system)
8. [JavaScript Functionality](#javascript-functionality)
9. [SEO Features](#seo-features)
10. [Responsive Design](#responsive-design)
11. [Customization Guide](#customization-guide)

---

## Theme Overview

**Theme Name:** My Theme BASE  
**Author:** Kenichi Shinagawa  
**Version:** 1.0  
**Description:** A custom WordPress theme designed for International Student Ministry Canada (ISMC), featuring dual-audience support (students and volunteers), interactive maps, and modern web design.

### Purpose
This theme serves as the primary website for ISMC, an organization that supports international students across Canada. The theme provides separate experiences for students and volunteers/supporters, with dynamic content management and interactive features.

---

## File Structure

```
my-theme-base/
├── data/                          # JSON data files
│   ├── cities-data.json          # City locations and contact info
│   └── programs-data.json        # Program information
├── images/                        # Theme images and assets
│   ├── ISMC_primary_logo.png     # Main logo
│   ├── hero-image.jpg/webp       # Hero images
│   └── [various images]          # Other theme images
├── content-*.php                  # Content template parts
│   ├── content-cta-button.php     # Donate CTA button
│   ├── content-find-your-city-button.php
│   └── content-page-toggle.php   # Student/Volunteer toggle
├── header.php                     # Main header template
├── header-supporter.php           # Supporter-specific header
├── footer.php                     # Footer template
├── front-page.php                 # Homepage template
├── index.php                      # Default template
├── single.php                     # Single post template
├── page-*.php                     # Custom page templates
│   ├── page-about.php
│   ├── page-about-volunteer.php
│   ├── page-find-your-city.php
│   ├── page-give.php
│   ├── page-learn.php
│   ├── page-life-in-canada.php
│   ├── page-life-in-canada-children.php
│   ├── page-pray.php
│   ├── page-programs.php
│   └── page-volunteer.php
├── functions.php                  # Theme functions and features
├── style.css                     # Main stylesheet (2048 lines)
└── screenshot.png                 # Theme screenshot
```

---

## Key Features

### 1. Dual-Audience Support
- **Student Pages**: Default experience for international students
- **Volunteer/Supporter Pages**: Alternative experience for volunteers and supporters
- **Page Toggle**: Header toggle switch to switch between student and volunteer views
- **Conditional Content**: Different headers, footers, and CTAs based on page type

### 2. Interactive Map Integration
- **Leaflet.js Integration**: Interactive map showing ISMC locations across Canada
- **City Data**: JSON-based city information with coordinates, contact details, and social links
- **Dynamic Markers**: Clickable markers that display city information
- **City List**: Searchable/filterable list of all cities

### 3. Dynamic Content Management
- **JSON Data Files**: Programs and cities managed via JSON files
- **Template Parts**: Reusable content components
- **Custom Page Templates**: Specialized templates for different content types

### 4. Performance Optimizations
- **WebP Image Support**: Automatic WebP detection and fallback
- **Preloading**: Critical resource preloading for LCP optimization
- **Font Optimization**: Google Fonts with print media loading strategy

### 5. SEO Features
- **Comprehensive Meta Tags**: Open Graph, Twitter Cards, and standard meta tags
- **Dynamic Descriptions**: Context-aware meta descriptions
- **Canonical URLs**: Proper canonical URL implementation
- **Structured Data**: Geographic and language meta tags

### 6. Modern UI/UX
- **Sticky Header**: Header shrinks on scroll
- **Mobile Menu**: Hamburger menu for mobile devices
- **Modal Dialogs**: Story modals using HTML5 dialog element
- **Smooth Animations**: Fade-in effects and parallax scrolling
- **Scroll-to-Top**: Floating button for easy navigation

---

## Template Hierarchy

### Standard Templates
- `front-page.php` - Homepage template
- `index.php` - Default fallback template
- `single.php` - Single post template
- `header.php` - Main header (student pages)
- `header-supporter.php` - Supporter header
- `footer.php` - Footer template

### Custom Page Templates
All use `Template Name:` in the header comment:

1. **page-programs.php** - Displays ISMC programs from JSON data
2. **page-find-your-city.php** - Interactive map with city locations
3. **page-about.php** - About page for students
4. **page-about-volunteer.php** - About page for volunteers (with story modals)
5. **page-give.php** - Donation page
6. **page-learn.php** - Learning resources page
7. **page-life-in-canada.php** - Life in Canada information
8. **page-life-in-canada-children.php** - Life in Canada for children
9. **page-pray.php** - Prayer resources page
10. **page-volunteer.php** - Volunteer information page

### Content Template Parts
- `content-cta-button.php` - Donate button for supporter pages
- `content-find-your-city-button.php` - Find Your City button for student pages
- `content-page-toggle.php` - Student/Volunteer toggle switch

---

## Core Functions

### Theme Setup (`functions.php`)

#### `mytheme_setup()`
- Adds title tag support
- Enables post thumbnails
- Registers navigation menus:
  - `primary` - Main navigation menu
  - `supporter` - Supporter navigation menu

#### `mytheme_favicon()`
- Adds custom SVG favicon
- Includes fallback for older browsers

#### `mytheme_widgets()`
- Registers sidebar widget area

#### `mytheme_enqueue()`
- Enqueues main stylesheet with cache-busting version

### SEO Functions

#### `mytheme_seo_meta_tags()`
Comprehensive SEO implementation:
- **Basic Meta Tags**: description, keywords, author, robots
- **Open Graph Tags**: title, description, URL, image, type, locale
- **Twitter Cards**: Large image card format
- **Geographic Tags**: Region and placename
- **Canonical URLs**: Prevents duplicate content issues

**Context-Aware**: Automatically adjusts meta tags based on:
- Front page
- Single posts/pages
- Blog archive
- Category/tag pages

### Performance Functions

#### `mytheme_preload_critical_resources()`
- Preloads hero image on front page
- Uses WebP format with high priority

#### `mytheme_webp_detection()`
- JavaScript-based WebP support detection
- Adds `webp` or `no-webp` class to `<html>` element
- Enables CSS-based image format switching

### JavaScript Functions

#### `front_page_custom_javascript()`
- **Fade-in Animations**: Intersection Observer for scroll-triggered animations
- **Parallax Effect**: Background parallax scrolling on hero section
- **Early Trigger**: Special handling for stories section

#### `find_out_page_custom_javascript()`
- **Story Modals**: Modal dialogs for student stories
- **Three Stories**: Charlie, Alex, and Naya's stories
- **Modal Management**: Open/close functionality with overlay

#### `header_custom_javascript()`
- **Mobile Menu**: Hamburger menu toggle
- **Scroll Detection**: Header shrinking on scroll
- **Menu State Management**: Toggle between hamburger and close icons

#### `story_page_custom_javascript()`
- **Multiple Modals**: Handles multiple story modals on learn page
- **Read More Buttons**: Opens modals from various triggers
- **Click Outside**: Closes modals when clicking backdrop

#### `find_your_city_map_functionality()`
- **Leaflet Integration**: Initializes Leaflet map
- **City Markers**: Creates markers from JSON data
- **City Info Display**: Shows city details on marker click
- **Map Bounds**: Auto-fits map to show all cities
- **City List**: Generates clickable city list

---

## Data Management

### JSON Data Files

#### `data/cities-data.json`
Structure:
```json
[
  {
    "name": "City Name",
    "lat": 48.4284,
    "lng": -123.3656,
    "staff_name": "Staff Name",
    "email": "email@ismc.ca",
    "website": "https://...",
    "social": {
      "facebook": "https://...",
      "twitter": "https://...",
      "instagram": "https://..."
    }
  }
]
```

**Usage:**
- Loaded in `find_your_city_map_functionality()`
- Used to create map markers
- Powers city information display
- Generates city list

#### `data/programs-data.json`
Structure:
```json
{
  "programs": [
    {
      "title": "Program Name",
      "description": "Program description",
      "image": "image.webp"
    }
  ]
}
```

**Usage:**
- Loaded in `page-programs.php`
- Displays program grid
- Each program shows image, title, and description

### Adding/Editing Data

**To add a new city:**
1. Open `data/cities-data.json`
2. Add new city object with required fields
3. Save file (no WordPress admin needed)

**To add a new program:**
1. Open `data/programs-data.json`
2. Add new program object to `programs` array
3. Add corresponding image to `images/` directory
4. Save file

---

## Styling & Design System

### Color Palette
- **Primary Blue**: `#1c57a1`, `#1a437d`, `rgb(17, 48, 86)`
- **Accent Yellow**: `#fcba03`, `#ffd45c`, `#ffe45c`
- **Text Colors**: 
  - Light: `#ddd`, `#fff`
  - Dark: `#333`, `#666`
- **Background**: `#fff` (light), `#1c57a1` (dark)

### Typography
- **Headings**: 'Bebas Neue', sans-serif
- **Body**: 'Montserrat', sans-serif
- **Font Loading**: Optimized with print media strategy

### Layout System
- **Max Width**: 1440px for content areas
- **Grid System**: CSS Grid for responsive layouts
- **Flexbox**: Used for component layouts
- **Responsive Breakpoints**:
  - Mobile: `max-width: 800px`
  - Tablet: `max-width: 1040px`
  - Desktop: `max-width: 1200px`

### Component Styles

#### Header
- Sticky positioning
- Shrinks from 100px to 60px on scroll
- Logo scales proportionally
- Mobile hamburger menu

#### Footer
- Three-column layout (desktop)
- Single column (mobile)
- Contact information with icons
- Conditional social links

#### Hero Sections
- Full-width background images
- Overlay for text readability
- Parallax scrolling effect
- WebP with JPG fallback

#### Cards/Items
- Rounded corners (24px border-radius)
- Background colors: `#1a437d`
- Hover effects: scale transforms
- Grid layouts for multiple items

---

## JavaScript Functionality

### Intersection Observer
Used for:
- Fade-in animations on scroll
- Early triggering for stories section
- Performance-optimized scroll detection

### Parallax Scrolling
- Background position adjustment on scroll
- Applied to hero sections
- Smooth, performant implementation

### Modal System
- HTML5 `<dialog>` element
- Overlay management
- Body scroll lock
- Click-outside-to-close
- Multiple modal support

### Map Functionality
- Leaflet.js integration
- Dynamic marker creation
- Popup management
- City information display
- Map bounds calculation

### Menu System
- Mobile hamburger menu
- Desktop horizontal menu
- Scroll-based header state
- Smooth transitions

---

## SEO Features

### Meta Tags
- **Description**: Auto-generated from content (max 160 chars)
- **Keywords**: Predefined relevant keywords
- **Author**: Site name
- **Robots**: Index, follow

### Open Graph
- Complete OG tag set for social sharing
- Dynamic image selection (post thumbnails)
- Proper content types (article/website)

### Twitter Cards
- Large image card format
- All required fields populated

### Additional SEO
- Canonical URLs
- Geographic tags (Canada)
- Language tags
- Distribution and rating tags

### Best Practices
- Context-aware meta generation
- Image optimization
- Proper heading hierarchy
- Semantic HTML

---

## Responsive Design

### Breakpoints
1. **Mobile**: `max-width: 800px`
   - Single column layouts
   - Stacked navigation
   - Full-width content
   - Adjusted font sizes

2. **Tablet**: `max-width: 1040px`
   - Two-column layouts
   - Adjusted spacing
   - Modified navigation

3. **Desktop**: `max-width: 1200px`
   - Multi-column grids
   - Full feature set
   - Optimal spacing

### Mobile-Specific Features
- Hamburger menu
- Touch-friendly buttons
- Optimized image sizes
- Simplified layouts
- Adjusted typography

### Responsive Components
- **Header**: Collapses to hamburger menu
- **Navigation**: Vertical stack on mobile
- **Grids**: Convert to single column
- **Maps**: Reduced height on mobile
- **Modals**: Full-width on mobile

---

## Customization Guide

### Adding a New Page Template

1. Create `page-{slug}.php` file
2. Add template name comment:
   ```php
   /**
    * Template Name: Your Template Name
    */
   ```
3. Include header/footer:
   ```php
   get_header();
   // Your content
   get_footer();
   ```

### Modifying Colors

Edit `style.css`:
- Search for color values
- Replace with new colors
- Maintain contrast ratios

### Adding New Programs

1. Edit `data/programs-data.json`
2. Add program object
3. Add image to `images/` directory
4. Reference image in JSON

### Adding New Cities

1. Edit `data/cities-data.json`
2. Add city object with coordinates
3. Include contact information
4. Add social links if available

### Customizing Header

- **Student Header**: Edit `header.php`
- **Supporter Header**: Edit `header-supporter.php`
- **Toggle Logic**: Edit `content-page-toggle.php`

### Modifying Footer

Edit `footer.php`:
- Contact information
- Social links
- Footer columns
- Conditional content

### Adding JavaScript

1. Add function to `functions.php`
2. Hook to `wp_head` or `wp_footer`
3. Use conditional tags for page-specific scripts

### Styling Customizations

1. Edit `style.css`
2. Use existing class names when possible
3. Follow existing naming conventions
4. Test responsive breakpoints

---

## Technical Details

### WordPress Requirements
- WordPress 5.0+
- PHP 7.4+
- Modern browser support

### External Dependencies
- **Leaflet.js**: 1.9.4 (for maps)
- **Google Fonts**: Bebas Neue, Montserrat
- **OpenStreetMap**: Map tiles

### Browser Support
- Modern browsers (Chrome, Firefox, Safari, Edge)
- WebP support detection
- CSS Grid and Flexbox
- Intersection Observer API

### Performance Considerations
- Image optimization (WebP)
- Lazy loading ready
- Preloading critical resources
- Efficient JavaScript execution
- CSS optimization

### Accessibility
- Semantic HTML
- ARIA labels on interactive elements
- Keyboard navigation support
- Focus states
- Alt text for images

---

## Maintenance Notes

### Regular Updates Needed
1. **City Data**: Update `cities-data.json` as locations change
2. **Program Data**: Update `programs-data.json` for new programs
3. **Images**: Optimize and add new images as needed
4. **Content**: Update page content through WordPress admin

### Testing Checklist
- [ ] Mobile responsiveness
- [ ] Map functionality
- [ ] Modal dialogs
- [ ] Navigation menus
- [ ] Form submissions
- [ ] Image loading
- [ ] SEO meta tags
- [ ] Cross-browser compatibility

### Common Issues
- **Map not loading**: Check Leaflet.js CDN availability
- **Images not showing**: Verify WebP detection
- **Menu not working**: Check JavaScript console
- **Styles not applying**: Clear browser cache

---

## Support & Resources

### Theme Files
- All theme files are in the theme directory
- No external dependencies required (except CDN resources)
- JSON data files are editable without code knowledge

### WordPress Integration
- Uses standard WordPress functions
- Follows WordPress coding standards
- Compatible with WordPress plugins
- Uses WordPress template hierarchy

---

## Version History

**Version 1.0** (Current)
- Initial release
- Dual-audience support
- Interactive map integration
- Complete SEO implementation
- Responsive design
- Performance optimizations

---

*Last Updated: [Current Date]*  
*Documentation Version: 1.0*

