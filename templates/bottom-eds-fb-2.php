<?php $formatted_ad_data = $ad_api_data['formatted_ads'];
if (count($formatted_ad_data['bottom_ads']) >= 1) { ?>

<div class="ed-container <?php echo SEM_SITE_PREFIX ?>-ed-sl-bottom-wrapper">
    <?php if (count($formatted_ad_data['bottom_ads']) >= 1) { ?>
    <?php
    if (function_exists('get_common_file_path')) {
      include(get_common_file_path('BottomAdUnitHeadLine'));
    }
  ?>
    <ul class="ed-block <?php echo SEM_SITE_PREFIX ?>-ed-sl-ul">
        <?php
      $adclassCounter = 1;
      foreach ($formatted_ad_data['bottom_ads'] as $key => $row) {
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
                    <span class="ed-website <?php echo SEM_SITE_PREFIX  ?>-ed-sl-url"><?php echo $row['siteHost']; ?></span>
                    <span class="ed-description static-text <?php echo SEM_SITE_PREFIX  ?>-ed-sl-desc"> | <?php echo $row['description']; ?></span>
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
                    include(get_common_file_path('BottomAdUnitExtraExtensions',array('row'=>$row)));
                    ?>
                </div>
            </div>
            <?php if($row['show_cta']) { ?>
            <a <?php echo $row['extra_anchor_attributes']; ?> target="_blank" href="<?php echo $row['clickUrl']; ?>"
                class="see-it-btn track_click see-it <?php echo SEM_SITE_PREFIX  ?>-ed-sl-cta <?php echo SEM_SITE_PREFIX  ?>-ed-sl-clicklink"><?php echo (isset($row['cta_text'])) ? $row['cta_text'] : 'see it'; ?>
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