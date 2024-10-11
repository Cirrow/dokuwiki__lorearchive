<?php
/** 
* Modern ACL buttons powered by Bootstrap and Javascript
* @author Cieron <cirrow@proton.me>
*
*/
?>

<!-- IS THE USER LOGGED IN? IS SHOWTOOLS TRUE? -->
<?php if ($conf['useacl'] && $showTools): /* are you using ACL, and is showTools true? If so, */ ?>

<div id="headeradmin" class="btn-group">
    <a id="adminbutton" role="button" class="btn btn-outline-primary" href="" data-bs-toggle="tooltip" data-bs-title="Go the the admin page">Admin</a>
    <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <?php if (!empty($_SERVER['REMOTE_USER'])) {
            echo '<a class="dropdown-item">';
            tpl_userinfo(); /* 'Logged in as ...' */
            echo '</a>';
        } ?>
        <a class="dropdown-item">Log Out</a>

        <?php if (file_exists(DOKU_INC . 'inc/Menu/UserMenu.php')) 
        {
            /* the first parameter is for an additional class, the second for if SVGs should be added */
            echo (new \dokuwiki\Menu\UserMenu())->getListItems('action ', false);
        } 
        
        else {
            /* tool menu before Greebo */
            _tpl_usertools();
        } 
        
        ?>
    </ul>                         
</div>

<?php endif ?>

<?php if (empty($_SERVER['REMOTE_USER'])): ?>

<a id="loginbutton" role="button" class="btn btn-outline-primary" href="">Log In</a>


<?php endif ?>