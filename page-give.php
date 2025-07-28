<?php
/**
 * Template Name: Donate Page
 *
 */
get_header('supporter');
$breadcrumbs_show = get_post_meta(get_the_ID(), 'breadcrumbs_show', true);
?>

<div class="supporter-bg">
  <div class="page-hero-container">
    <div class="hero-overlay"></div>
    <div class="page-hero-message">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="content-area">
    <section <?php post_class(); ?>>
      <div class="content-wrapper">
        <div class="message-text-supporter page-content-supporter">
          <h3>SUPPORT the mission of reaching and empowering international students!</h3>
          <div class="donate-container">
            <div class="donate-text">
              <p>International Student Ministries Canada—ISMC—is an interdenominational faith mission, incorporated in Canada, and supported by partners and friends who share our vision to empower international students to impact the world through Jesus Christ. Donations large and small fuel staff and special projects that reach international students across the nation so they can become Christ’s servants, ministering around the world!</p>
              <p>Online donations are processed through <a href="https://www.canadahelps.org/en/" target="_blank" rel="noopener noreferrer">Canada Helps</a>, and subjected to a 3.5–4% transaction processing fee. You will receive a tax receipt by email from Canada Helps. If you have trouble with the donation form above, please visit <a href="https://www.canadahelps.org/en/charities/ismc-international-student-ministries-canada/" target="blank" rel="noopener noreferrer">ISMC’s donation page on Canada Helps</a>.</p>

              <p>Fundraising for staff salary goals includes salary needs, ministry expenses, and an 11% administration fee.</p>

              <p>Donations are receipted only for staff and projects approved by the governing board. Designated gifts are used for the purpose for which they are given; when that given need is met, excess funds are used where needed most.</p>

              <p>Gifts of $10 or more are acknowledged with a Canadian receipt for income tax purposes. Charity Registration No: 12954-3302-RR0001</p>
            </div>
            <div class="donate-column">
              <script id="ch_cdn_embed" src="https://www.canadahelps.org/services/wa/js/apps/donatenow/embed.min.js" type="text/javascript" data-page-id="36384" data-cfasync="false" data-formtype="1"></script>
            </div>
          </div>
          <h3>Other ways to give</h3>
          <ul class="donate-list">
            <li class="donate-item">
              <h4>E-Transfers</h4>
              <p>To donate by e-Transfer, send your donation to <a href="mailto:finance@ismc.ca">finance@ismc.ca</a>. In the note field, <strong><em>specify the fund and include your mailing address</em></strong> for your tax receipt. Donations without a specified fund will be directed to the National Ministry Fund. E-Transfer donations are fee-free, so 100% of your contribution goes to ISMC.</p>
            </li>
            <li class="donate-item">
              <h4>Online</h4>
              <p>Online by credit card to a staff member, project or where most needed. <a href="https://www.canadahelps.org/en/charities/ismc-international-student-ministries-canada/" target="blank" rel="noopener noreferrer">ISMC’s donation page on Canada Helps</a></p>

              <p>Monthly Pre-Authorized Donation</p>
              <p>To set up monthly donations from your bank account, complete the <a href="https://ismc.ca/proto/wp-content/uploads/2025/02/EFT-Digital-Form-2024.pdf" target="_blank" rel="noopener">electronic funds transfer authorization form</a> (fillable PDF) and email it to <a href="mailto:finance@ismc.ca">finance@ismc.ca</a>, or mail the <a href="https://ismc.ca/proto/wp-content/uploads/2025/02/EFT-Form-2024.pdf" target="_blank" rel="noopener">printed EFT form</a>, along with a void cheque, to ISMC.</p>
            </li>
            <li class="donate-item">
              <h4>Mail</h4>
              <p>Please complete the <a href="https://ismc.ca/proto/wp-content/uploads/2025/02/Internet-Form-for-Offline-Giving-2024.pdf" target="_blank" rel="noopener">mail-in giving form</a> and send it with your cheque to ISMC. <span style="font-weight: 400;">Cheque donations are fee-free, ensuring 100% of your gift goes to ISMC.</span></p>
              <p>Post-dated cheques for monthly support are also accepted and will be deposited on the specified date.</p>
              <p>
                <strong>Mailing address:</strong><br>
                International Student Ministries Canada<br>
                Box 1205, Three Hills, AB, T0M 2A0<br>
                Phone: 403 443-5676
              </p>
            </li>
            <li class="donate-item">
              <h4>Planned Giving</h4>
              <p>ISMC has partnered with <a href="https://www.linkcharity.ca/" target="_blank" rel="noopener">Link Charity</a> who can help you in the area of gift planning <span style="font-weight: 400;">through annuities, will bequests, in kind stock donations, or donor advised funds from your own family foundation.</span></p>
            </li>
          </ul>
          <h3>For more information, please contact:</h3>
          <p>Susan Esau<br>Senior Accountant<br>403-443-5676<br><a href="mailto:finance@ismc.ca">finance@ismc.ca</a></p>
          <img src="<?php echo get_template_directory_uri(); ?>/images/cccc-web.png" alt="CCCC Web">
          <p>International Student Ministries Canada—ISMC is a member of the Canadian Centre for Christian Charities—CCCC.</p>
          <p>Charity Registration No: 12954-3302-RR0001</p>
        </div>
      </div>
    </section>
    <span class="go-back-link-supporter"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<?php get_footer(); ?>
