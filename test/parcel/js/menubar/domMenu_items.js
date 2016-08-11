// {{{ domMenu_main: data

domMenu_data.set('domMenu_main', new Hash(
   1, new Hash(
        'contents', 'Utama',
        'contentsHover', 'Utama',
        'uri', '',
        'target', '_self',
        'statusText', 'Mojavelinux.com homepages',
		1, new Hash(
            'contents', 'Senarai Kabinet',
             'uri', '../content/dashboard.php',
            'statusText', 'Learn what powers mojavelinux.com'
        ),
        2, new Hash(
            'contents', 'Carian Fail',
             'uri', '../content/searchFile.php',
            'statusText', 'Read about Dan'
			)),
    2, new Hash(
        'contents', 'Kemaskini',
        'contentsHover', 'Kemaskini',
        'uri', '',
        1, new Hash(
            'contents', 'Kabinet',
            'uri', '../content/editKabinet.php',
            'statusText', 'Learn what powers mojavelinux.com'
        ),
		2, new Hash(
            'contents', 'Aras',
            'uri', '../content/editAras.php',
            'statusText', 'Read about Dan'
		)
        
        ),
       
       3, new Hash(
        'contents', 'Admin',
        'contentsHover', 'Admin',
        'uri', '',
        'target', '_self',
        'statusText', 'Mojavelinux.com homepages',
		1, new Hash(
            'contents', 'Senarai Pengguna',
             'uri', '../content/pengguna.php',
            'statusText', 'Learn what powers mojavelinux.com'
        )
		),
	4, new Hash(
        'contents', 'Log Keluar',
        'contentsHover', 'Log Keluar',
        'uri', '../content/login.php',
        'statusText', 'Demo Sites'
        )
    
));

// }}}
// {{{ domMenu_main: settings

domMenu_settings.set('domMenu_main', new Hash(
    'subMenuWidthCorrection', -1,
    'verticalSubMenuOffsetX', -1,
    'verticalSubMenuOffsetY', -1,
    'horizontalSubMenuOffsetX', domLib_isOpera ? 0 : 1,
    'horizontalSubMenuOffsetY', domLib_isOpera ? -1 : 0,
    'openMouseoverMenuDelay', 100,
    'closeMouseoutMenuDelay', 300,
    'expandMenuArrowUrl', '../css/menubar/image/arrow.gif',
    'baseUri', 'http://www.mojavelinux.com'
));

// }}}
// {{{ domMenu_keramik: data

domMenu_data.set('domMenu_keramik', new Hash(
    1, new Hash(
        'contents', 'Home',
        'uri', '',
        'statusText', 'Home',
        1, new Hash(
            'contents', 'Main Page',
            'uri', 'http://www.example.com',
            'statusText', 'Mojave Page'
        ),
        2, new Hash(
            'contents', 'Contact mojavelinux.com',
            'uri', '',
            'statusText', 'Contact mojavelinux.com',
            1, new Hash(
                'contents', 'Dan',
                'uri', 'http://www.example.com',
                'statusText', 'Dan'
            ),
            2, new Hash(
                'contents', 'Sarah',
                'uri', 'http://www.example.com',
                'statusText', 'Sarah'
            )
        ),
        3, new Hash(
            'contents', 'Terms of Use',
            'uri', 'http://www.example.com',
            'statusText', 'Terms of Use'
        ),
        4, new Hash(
            'contents', 'Search this site',
            'uri', 'http://www.example.com',
            'statusText', 'Search this site'
        ),
        5, new Hash(
            'contents', 'Customize',
            'uri', '',
            'statusText', 'Customize',
            1, new Hash(
                'contents', 'Style Schemas',
                'uri', '',
                'statusText', 'Style Schemas'
            ),
            2, new Hash(
                'contents', 'Blue',
                'uri', 'http://example.com',
                'statusText', 'Blue'
            ),
            3, new Hash(
                'contents', 'Green',
                'uri', 'http://example.com',
                'statusText', 'Green',
                1, new Hash(
                    'contents', 'Green',
                    'uri', 'http://example.com',
                    'statusText', 'Green'
                )
            )
        )
    ),
    2, new Hash(
        'contents', 'CSS',
        'uri', '',
        'statusText', 'CSS',
        1, new Hash(
            'contents', 'Tutorials',
            'uri', '',
            'statusText', 'Tutorial Links'
        ),
        2, new Hash(
            'contents', 'Using Stylesheets',
            'uri', 'http://www.example.com',
            'statusText', ''
        ),
        3, new Hash(
            'contents', 'CSS Positioning',
            'uri', 'http://www.example.com',
            'statusText', 'Learning how to position elements with CSS'
        )
    ),
    3, new Hash(
        
    ),
    4, new Hash(
        'contents', 'DHTML',
        'uri', '',
        'statusText', 'Dynamic HTML',
        1, new Hash(
            'contents', 'Tutorials',
            'uri', '',
            'statusText', 'Dynamic HTML Tutorials'
        ),
        2, new Hash(
            'contents', 'DOM Tooltip',
            'uri', 'http://www.example.com',
            'statusText', 'Making custom tooltips using the DOM'
        )
    ),
    5, new Hash(
        'contents', 'PHP',
        'uri', '',
        'statusText', 'PHP Section',
        1, new Hash(
            'contents', 'Tutorials',
            'uri', '',
            'statusText', 'PHP Tutorials'
        ),
        2, new Hash(
            'contents', 'Handling actions',
            'uri', 'http://www.example.com',
            'statusText', 'Form actions in PHP'
        )
    )
));

// }}}
// {{{ domMenu_keramik: settings

domMenu_settings.set('domMenu_keramik', new Hash(
    'menuBarWidth', '0%',
    'menuBarClass', 'keramik_menuBar',
    'menuElementClass', 'keramik_menuElement',
    'menuElementHoverClass', 'keramik_menuElementHover',
    'menuElementActiveClass', 'keramik_menuElementHover',
    'subMenuBarClass', 'keramik_subMenuBar',
    'subMenuElementClass', 'keramik_subMenuElement',
    'subMenuElementHoverClass', 'keramik_subMenuElementHover',
    'subMenuElementActiveClass', 'keramik_subMenuElementHover',
    'subMenuMinWidth', 'auto',
    'horizontalSubMenuOffsetX', -5,
    'horizontalSubMenuOffsetY', 3,
    'distributeSpace', false,
    'openMouseoverMenuDelay', -1,
    'openMousedownMenuDelay', 0,
    'closeClickMenuDelay', 0,
    'closeMouseoutMenuDelay', -1,
    'expandMenuArrowUrl', 'arrow.gif'
));

// }}}
// {{{ domMenu_BJ: data

domMenu_data.set('domMenu_BJ', domLib_clone(domMenu_data.get('domMenu_keramik')));

// }}}
// {{{ domMenu_BJ: settings

domMenu_settings.set('domMenu_BJ', new Hash(
    'menuBarWidth', '0%',
    'menuBarClass', 'BJ_menuBar',
    'menuElementClass', 'BJ_menuElement',
    'menuElementHoverClass', 'BJ_menuElementHover',
    'menuElementActiveClass', 'BJ_menuElementActive',
    'subMenuBarClass', 'BJ_subMenuBar',
    'subMenuElementClass', 'BJ_subMenuElement',
    'subMenuElementHoverClass', 'BJ_subMenuElementHover',
    'subMenuElementActiveClass', 'BJ_subMenuElementHover',
    'subMenuMinWidth', 'auto',
    'distributeSpace', false,
    'openMouseoverMenuDelay', -1,
    'openMousedownMenuDelay', 0,
    'closeClickMenuDelay', 0,
    'closeMouseoutMenuDelay', -1,
    'expandMenuArrowUrl', 'arrow.gif'
));

// }}}
// {{{ domMenu_vertical: data

domMenu_data.set('domMenu_vertical', domLib_clone(domMenu_data.get('domMenu_main')));

// }}}
// {{{ domMenu_vertical: settings

domMenu_settings.set('domMenu_vertical', new Hash(
    'axis', 'vertical',
    'verticalSubMenuOffsetX', -2,
    'verticalSubMenuOffsetY', -1,
    'horizontalSubMenuOffsetX', 1,
    'baseUri', 'http://www.mojavelinux.com'
));

// }}}
// {{{ domMenu_lvertical: data

domMenu_data.set('domMenu_lvertical', domLib_clone(domMenu_data.get('domMenu_main')));

// }}}
// {{{ domMenu_lvertical: settings

domMenu_settings.set('domMenu_lvertical', new Hash(
    'axis', 'vertical',
    'verticalSubMenuOffsetX', -1,
    'verticalSubMenuOffsetY', -1,
    'horizontalSubMenuOffsetX', 1,
    'horizontalSubMenuOffsetY', 0,
    'expandMenuArrowUrl', 'larrow.gif',
	'horizontalExpand', 'west',
	'subMenuMinWidth', 'auto',
    'baseUri', 'http://www.mojavelinux.com'
));

// }}}
