<?php
// Determine if we're on a supporter/volunteer page or student page
// Check the global variable set by the header files
global $ismc_page_type;
$is_supporter_page = isset($ismc_page_type) && $ismc_page_type === "supporter";
?>
<div class="content-page-toggle-container">
  <div class="header-navigation-page-toggle">
    <?php if ($is_supporter_page): ?>
      <a href="<?php echo esc_url(home_url("/")); ?>">Student</a><span class="toggle-separator">|</span>Volunteer
    <?php else: ?>
      Student<span class="toggle-separator">|</span><a href="<?php echo esc_url(home_url("/find-out")); ?>">Volunteer</a>
    <?php endif; ?>
  </div>
</div>