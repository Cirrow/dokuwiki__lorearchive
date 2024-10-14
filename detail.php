<?php
/**
 * DokuWiki Image Detail Page
 *
 * @author   Cieron <cirrow@proton.me>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */
$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && !empty($_SERVER['REMOTE_USER']) );

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <title>
        <?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG))?> // <?php echo strip_tags($conf['title'])?>
    </title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <?php tpl_metaheaders()?>

    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>


    <style>

        #dokuwiki__detail {

            margin-top: 8vh;
        }

        
        #dokuwiki__detail h1 {

            text-align: center;
        }

        .center-image {

            display: flex;
            justify-content: center;
            align-items: center;
        }

        #image__detail {

            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center; /* Center text inside the div */
            flex-direction: column; /* Stack children vertically */


        }


    </style>



</head>

<body>

    <?php require_once('surrounding/header/header.php') ?>

    <div id="dokuwiki__detail" class="<?php echo tpl_classes(); ?>">
        <?php html_msgarea() ?>

        <?php if($ERROR): print $ERROR; ?>
        <?php else: ?>

            <main class="content group">
                <?php if($REV) echo p_locale_xhtml('showrev');?>
                <h1>Image detail</h1>

                <div id="detail__image" class="center-image">
                    <?php tpl_img(900, 700); /* the image; parameters: maximum width, maximum height (and more) */ ?>
                </div>

                <div id="image__detail">
                    <h2><?php echo hsc(tpl_img_getTag('IPTC.Headline', $IMG))?></h2>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><?php print nl2br(hsc(tpl_img_getTag('simple.title'))); ?></td>
                            <?php
                            ob_start();
                            tpl_img_meta();
                            $imageMetaOutput = ob_get_clean(); 
                            
                            $imageMetaItems = [];
                            preg_match_all('/<dt>(.*?)\s*:\s*<\/dt>\s*<dd>(.*?)<\/dd>/', $imageMetaOutput, $imageMetaItems, PREG_SET_ORDER);                            
                            foreach ($imageMetaItems as $item) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($item[1]) . '</td>';
                                echo '<td>' . nl2br(htmlspecialchars($item[2])) . '</td>';
                                echo '</tr>';
                            }
                            
                            ?>
                        </tr>
                    </table>
                </div>

                <nav>
                    <ul>
                        <?php if (file_exists(DOKU_INC . 'inc/Menu/DetailMenu.php')) {
                            echo (new \dokuwiki\Menu\DetailMenu())->getListItems('action ', false);
                        } else {
                            _tpl_detailtools();
                        } ?>
                    </ul>
                </nav>

            </main>

        <?php endif; ?>




    </div>
</body>
</html>
