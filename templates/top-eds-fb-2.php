<style>
.wp-ed-unit-headline-wrapper span { color: #753200; font-size: 14px; line-height: 18px }
.wp-ed-unit-headline-keyword-text { text-transform: capitalize; }
.ed-container { position: relative; }
.sponsored-link { position: absolute; right: 0; }
.ed-block { margin: 6px 0 20px; list-style: none; padding: 0px; }
.ed-block .eds-content { padding: 10px 0px 12px 0px; position: relative; background: transparent; transition: all .3s ease-in; border: 1px solid transparent; margin-bottom: 5px; }
.ed-block p { margin: 0px }
.ed-block h4 { margin: 0px }
.ed-block .static-block p { margin: 0; }
.ed-content { margin: 0 170px 0 50px; }
.ed-no { position: absolute; top: 50%; left: 0px; color: #753200; font-size: 20px; transform: translateY(-50%); transition: all .3s ease-in; width: 40px; height: 60px; border-radius: 50%; text-align: left; line-height: 60px; background-color: #fff; font-weight: 400; }
.ed-heading { color: #753200; font-size: 18px; font-weight: 700; transition: color .3s ease-in; text-transform: capitalize; text-decoration: underline; line-height: 26px; }
.ed-heading b, .ed-heading strong { color: inherit; font-size: inherit; font-weight: inherit; text-transform: capitalize; }
.ed-content .ed-txt-wrp { margin: 5px 0 }
.ed-website { color: #753200; font-size: 14px; }
.ed-description { font-weight: normal; color: #753200; font-size: 14px; }
.ed-description b, .ed-description strong { font-weight: inherit; font-size: inherit; color: inherit; }
.main-eds-link { position: absolute; left: 0; top: 0; width: 100%; height: 100%; display: block; background: url('data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==') repeat left top; }
.see-it-btn { width: 115px; padding-left: 20px; height: 44px; line-height: 44px; border-radius: 5.4px; position: absolute; top: 50%; right: 21px; transform: translateY(-50%); background: #7060ef; color: #fff; font-size: 17px; font-weight: 700; text-transform: uppercase; background: #753200; }
.see-it-btn span { display: flex; width: 40px; height: 40px; border-radius: 50%; position: absolute; right: 0px; top: 50%; transform: translateY(-50%); line-height: 40px; justify-content: center; align-items: center; }
.sitelinks ul { padding: 0px; list-style: none; margin: 5px 0px }
.sitelinks ul li { display: inline-block; vertical-align: top; max-width: 50%; margin-right: -5px; position: relative; z-index: 1; padding-left: 8px }
.sitelinks ul li a { margin-right: 15px; font-size: 14px; text-decoration: underline }
.sitelinks ul li::before { content: ''; display: block; position: absolute; width: 3px; height: 3px; border-radius: 50%; background: #000; top: 9px; left: 0; }
.ed-content .ed-extension-wrap { font-size: 14.5px; line-height: 22px; word-break: break-word; word-wrap: break-word; color: #753200; }
.ed-content .ed-extension-wrap .eds-sba, .ed-content .ed-extension-wrap .eds-brand { display: inline-block; }
.ed-content .ed-extension-wrap .eds-sba { margin-right: 15px }
.ed-content .ed-extension-wrap .eds-sba b, .ed-content .ed-extension-wrap .eds-brand b, .ed-content .ed-extension-wrap .eds-review { font-weight: 400; color: #753200; }

/* annot css */
.ed-block .rank-annot-hide .ed-content{margin-left: 0;margin-right: 0;}
.ed-block .cta-annot-hide .ed-content{margin-right: 0;}
.ed-block .cta-annot .ed-content{margin-right: 170px;}

@media only screen and (max-width: 767px) {
.ed-content { margin: 0; }
.ed-heading { position: relative; font-size: 18px; line-height: 24px; margin-bottom: 5px; min-height: auto; }
.ed-website { font-size: 14px; }
.ed-description { font-size: 14px; }
.see-it-btn { position: relative; top: 0; right: 0; transform: none; width: 100%; display: block; margin-top: 10px; font-size: 18px; height: 46px; line-height: 46px; }
.see-it-btn span { width: 35px; height: 35px; line-height: 35px; right: 6px; }
.ed-no { display: none; }
.ed-content .ed-extension-wrap { font-size: 14px; }

/* annot css */
.ed-block .cta-annot .ed-content{margin-right: 0;}
}
@media screen and (min-width: 1025px) {
.ed-block .eds-content:hover .ed-heading { color: #ff6024 }
.ed-block .eds-content:hover .see-it-btn{ background-color: #ff6024; }
}
</style>
<?php $formatted_ad_data = $ad_api_data['formatted_ads'];
if (count($formatted_ad_data['top_ads']) >= 1) { ?>

<div class="ed-container <?php echo SEM_SITE_PREFIX ?>-ed-sl-top-wrapper">
    <?php if (count($formatted_ad_data['top_ads']) >= 1) { ?>
    <?php
    if (function_exists('get_common_file_path')) {
      include(get_common_file_path('TopAdUnitHeadLine'));
    }
  ?>
    <ul class="ed-block <?php echo SEM_SITE_PREFIX ?>-ed-sl-ul">
        <?php
      $adclassCounter = 1;
      foreach ($formatted_ad_data['top_ads'] as $key => $row) {
            $classList[] = $row['show_rank'] ? 'rank-annot' : 'rank-annot-hide';
            $classList[] = $row['show_cta'] ? 'cta-annot' : 'cta-annot-hide';
            $classList[] = $row['show_site_links_annotations'] ? 'site-links-annot' : 'site-links-annot-hide';
        if ($adclassCounter > 2)
          break;
    ?>
        <li class="eds-content pos-rel <?php echo SEM_SITE_PREFIX  ?>-ed-sl-li <?php echo implode(' ',$classList); ?>">
            <div class="ed-content">
                <h4 class="ed-heading <?php echo SEM_SITE_PREFIX  ?>-ed-sl-title">
                    <?php if($row['show_rank']) { ?>
                    <p class="ed-no">0<?php echo $key+1; ?></p>
                    <?php } ?>
                    <?php echo $row['title']; ?>
                </h4>
                <p class="ed-txt-wrp">
                    <span
                        class="ed-website <?php echo SEM_SITE_PREFIX  ?>-ed-sl-url"><?php echo $row['siteHost']; ?></span>
                    <span class="ed-description static-text <?php echo SEM_SITE_PREFIX  ?>-ed-sl-desc"> |
                        <?php echo $row['description']; ?></span>
                </p>

                <?php if (isset($row['siteLinks']) && !empty($row['siteLinks'])) { ?>
                <div class="sitelinks site-wrap clearfix">
                    <ul class="<?php echo SEM_SITE_PREFIX  ?>-ed-sl-sitelinks-ul">
                        <?php
                foreach ($row['siteLinks'] as $sitelink) {
                if (isset($sitelink['title'])) {
              ?>
                        <li class="tped_sitelinks <?php echo SEM_SITE_PREFIX ?>-ed-sl-sitelinks-li">
                            <a target="_blank" class="track_click" href="<?php echo $sitelink['rurl']; ?> "
                                <?php echo $row['extra_anchor_attributes']; ?>><?php echo $sitelink['title']; ?></a>
                        </li>
                        <?php }
              } ?>
                    </ul>
                </div>
                <?php } ?>
                <div class="ed-extension-wrap">
                    <?php //Add this in for loop of each Top Ad
                    include(get_common_file_path('TopAdUnitExtraExtensions',array('row'=>$row)));
                    ?>
                </div>
            </div>
            <?php if($row['show_cta']) { ?>
            <a <?php echo $row['extra_anchor_attributes']; ?> target="_blank" href="<?php echo $row['clickUrl']; ?>"
                class="see-it-btn track_click see-it <?php echo SEM_SITE_PREFIX  ?>-ed-sl-cta <?php echo SEM_SITE_PREFIX  ?>-ed-sl-clicklink tran"><?php echo (isset($row['cta_text'])) ? $row['cta_text'] : 'see it'; ?>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#FFF" stroke="#FFF" stroke-width=".9">
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M98.627 21.605l-4.205-4.327c-.244-.237-.619-.237-.85 0-.23.237-.23.622 0 .874l3.788 3.898-3.787 3.898c-.23.237-.23.637 0 .874s.605.237.85 0l4.204-4.342c.23-.237.23-.623 0-.875z"
                                                transform="translate(-1254.000000, -745.000000) translate(165.000000, 693.000000) translate(0.000000, 36.000000) translate(997.000000, 0.000000)" />
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>

                </span>
            </a>
            <?php } ?>
            <a href="<?php echo $row['clickUrl']; ?>" <?php echo $row['extra_anchor_attributes']; ?>
                class="track_click spacer main-eds-link <?php echo SEM_SITE_PREFIX  ?>-ed-sl-clicklink"
                target="_blank"></a>
        </li>

        <?php $adclassCounter++;} ?>
        <?php } ?>

    </ul>
</div>
<?php } ?>