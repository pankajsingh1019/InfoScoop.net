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
                    <?php echo $row['title']; ?>
                </h4>
                <div class="ed-txt-wrp">
                    <div class="ed-website <?php echo SEM_SITE_PREFIX  ?>-ed-sl-url"><?php echo $row['siteHost']; ?></div>
                    <div class="ed-description static-text <?php echo SEM_SITE_PREFIX  ?>-ed-sl-desc"><?php echo $row['description']; ?></div>
                </div>

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
                <svg width="18px" height="20px" viewBox="0 0 18 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="IZ_SERP-1---open" transform="translate(-1201.000000, -482.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g id="ads" transform="translate(165.000000, 400.000000)">
                                <g id="Ad" transform="translate(0.000000, 30.000000)">
                                    <g id="CTA" transform="translate(935.000000, 40.500000)">
                                        <g id="Group-4" transform="translate(101.000000, 11.000000)">
                                            <path d="M2,6.17153629 C2,5.88124411 2.10531859,5.57021678 2.33701948,5.34213007 C2.80042127,4.88595664 3.5376514,4.88595664 4.00105319,5.34213007 L12.0052659,13.200754 L19.988415,5.34213007 C20.4518167,4.88595664 21.1890469,4.88595664 21.6524487,5.34213007 C22.1158504,5.79830349 22.1158504,6.52403393 21.6524487,6.98020735 L12.8478146,15.6682375 C12.6161137,15.8963242 12.3212217,16 12.0052659,16 C11.6893102,16 11.3944181,15.8755891 11.1627172,15.6682375 L2.33701948,6.98020735 C2.10531859,6.75212064 2,6.46182846 2,6.17153629 Z" id="Path" transform="translate(12.000000, 10.500000) rotate(-90.000000) translate(-12.000000, -10.500000) "></path>
                                            <path d="M-3,7.74552309 C-3,7.56079171 -2.93154292,7.36286522 -2.78093734,7.21771913 C-2.47972617,6.92742696 -2.00052659,6.92742696 -1.69931543,7.21771913 L3.50342285,12.2186616 L8.69246972,7.21771913 C8.99368088,6.92742696 9.47288046,6.92742696 9.77409163,7.21771913 C10.0753028,7.50801131 10.0753028,7.96983977 9.77409163,8.26013195 L4.05107952,13.7888784 C3.90047393,13.9340245 3.7087941,14 3.50342285,14 C3.29805161,14 3.10637177,13.9208294 2.95576619,13.7888784 L-2.78093734,8.26013195 C-2.93154292,8.11498586 -3,7.93025448 -3,7.74552309 Z" id="Path-Copy" opacity="0.458147321" transform="translate(3.500000, 10.500000) rotate(-90.000000) translate(-3.500000, -10.500000) "></path>
                                        </g>
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