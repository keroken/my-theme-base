<?php
// Determine if we're on a supporter/volunteer page or student page
// Check the global variable set by the header files
global $ismc_page_type;
$is_supporter_page = isset($ismc_page_type) && $ismc_page_type === "supporter";
?>
<div class="content-page-toggle-container">
  <div class="page-toggle-switch">
    <?php if ($is_supporter_page): ?>
      <a href="<?php echo esc_url(home_url("/")); ?>" class="toggle-option">Student</a>
      <span class="toggle-option toggle-option-active">Volunteer</span>
    <?php else: ?>
      <span class="toggle-option toggle-option-active">Student</span>
      <a href="<?php echo esc_url(home_url("/find-out")); ?>" class="toggle-option">Volunteer</a>
    <?php endif; ?>
  </div>
</div>