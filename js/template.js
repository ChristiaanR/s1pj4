/*
 * @package     Joomla.Site
 * @subpackage  Templates.J4test
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       4.0.0
 */

Joomla = window.Joomla || {};

window.onscroll = function () {
	resizeLogo();
};

function resizeLogo() {
	if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
		document.querySelector('#header').setAttribute('data-size', 'small');
	} else {
		document.querySelector('#header').setAttribute('data-size', 'default');
	}
}

// create menu toggle
// let the DOM load so the elements exist
window.addEventListener('DOMContentLoaded', (event) => {
	const toggleMenu = document.querySelector('#navbutton');
	const menu = document.querySelector('#mainnav');

	toggleMenu.addEventListener('click', function () {
		if (menu.getAttribute('data-collapse') == 'false') {
			menu.setAttribute('data-collapse', 'true'), toggleMenu.setAttribute('data-open', 'false');
		} else {
			menu.setAttribute('data-collapse', 'false'), toggleMenu.setAttribute('data-open', 'true');
		}
	});
});

// count menu items to give know the height of the nav when stacked
window.addEventListener('DOMContentLoaded', (event) => {
	const mainMenu = document.querySelector('#hoofdmenu');
	const navItems = mainMenu.childElementCount;
	// mainMenu.setAttribute('data-count', navItems);
	document.querySelector('#mainnav').setAttribute('data-count', navItems);
});
