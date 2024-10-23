# Contributing to the Lore Archive Wiki (LAW)
## Prerequisites
To effectively contribute to the frontend code, it is recommended you are familiar with the **HTML** and **CSS** syntax and workflow. PHP is not required _per se_, but it can make your time contributing a whole lot less confusing. Javascript knowledge is not _required_. Just like myself. I can't code JS for ****.

## Inline comments for PHP functions
Many PHP functions come with inline comments. This is to aid your contributions to the frontend. See, for DokuWiki to properly operate on the template, it inevitably requires PHP code to be present.


## File structure and ecosystem
Let's skip the folders for now, get into the root directory files first:
### Files (root)
- **detail.php**: This file includes structure for the image detail panel. This page is triggered when a user clicks on an image, to reveal more technical information about the image.
- **main.php**: This file includes the main structure for the wiki. This file will be your go-to if you want to alter the main wiki structure.
- **mediamanager.php**: This file includes the media manager structure. Not yet ready.
- **script.js**: All JS related code goes here.
- **style.ini**: An INI file, contianing instruction on which files to include for use when rendering the page.
- **template.info.txt**: A template information file, required by DokuWiki
- **tpl_functions.php**: This file includes all custom-declared PHP functions.
