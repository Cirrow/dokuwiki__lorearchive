<?php
/**
*
* This file provides html and php structure for the header.
* @author Cieron <cirrow@proton.me>
* @license GPL v2 (http://www.gnu.org/licenses/gpl.html)
*
*/

if (!defined('DOKU_INC')) die(); /* Must be run from within DokuWiki */
?>

<header id="dokuwiki__header">
    <div class="headercontent">

        <a class="d-inline d-lg-none btn" data-bs-toggle="offcanvas" href="#sidebarOffcanvas" role="button" aria-controls="sidebarOffcanvas">
            <i class="bi bi-list" style="color: black; font-size: 2em;"></i>
        </a>

        <div class="logo">
            <?php tpl_link(wl(),'<img src="'.ml('logo.png').'" alt="'.$conf['title'].'" />','id="dokuwiki__top" ') ?>
        </div>

        <div class="headerlinks d-none d-lg-inline">
            <a href="<?php echo wl('changelog') ?>">CHANGELOG</a> <!--wl('foo') generates a wikilink which points to the page with id "foo" -->
            <a href="<?php echo wl('our_team') ?>">ABOUT</a>
            <a href="<?php echo wl('prealpha') ?>">PRE-ALPHA</a>  
        </div>

        <button type="button" class="btn d-inline d-xl-none" data-bs-toggle="modal" data-bs-target="#dokuwiki__searchModal">
            <i class="bi-search" style="font-size: 1.3em;"></i>
        </button>

        <div class="d-none d-xl-flex headersearch">
            <form action="<?php echo wl(); ?>" method="get" role="search" class="search" id="dw__search">
                <div class="no">
                    <input type="hidden" name="do" value="search">
                    <input type="hidden" name="id" value="<?php global $ID; echo $ID; ?>">

                    <input 
                        type="text" 
                        name="q" 
                        id="qsearch__in" 
                        class="edit" 
                        placeholder="  <?php global $lang; echo $lang['btn_search']; ?>" 
                        autocomplete="<?php echo $autocomplete ? 'on' : 'off'; ?>"/>
                </div>
            </form>
        </div>




        <a href="https://github.com/Cirrow/dokuwiki__lorearchive" target="_blank" rel="noopener noreferrer">
            <i class="bi-github" style="color: black; font-size: 1.9em;"></i>
        </a>

        <?php require_once('aclbuttons.php') ?>


    </div>
</header>