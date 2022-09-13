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
	if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
		document.querySelector('#header').setAttribute('data-size', 'small');
	} else {
		document.querySelector('#header').setAttribute('data-size', 'default');
	}
}

// let the DOM load so the elements exist
window.addEventListener('DOMContentLoaded', (event) => {
	const toggleMenu = document.querySelector('#navbutton');
	const menu = document.querySelector('#mainnav');

	toggleMenu.addEventListener('click', function () {
		if (menu.getAttribute('data-collapse') == 'false') {
			menu.setAttribute('data-collapse', 'true');
		} else {
			menu.setAttribute('data-collapse', 'false');
		}
	});
});
