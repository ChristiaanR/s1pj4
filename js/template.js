/*
 * @package     Joomla.Site
 * @subpackage  Templates.J4test
 * @copyright   (C) 2017 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       4.0.0
 */

// Joomla = window.Joomla || {};

// create menu toggle
const toggleMenu = document.querySelector('#navbutton');
const menu = document.querySelector('#mainnav');

toggleMenu.addEventListener('click', function () {
	if (menu.getAttribute('data-collapse') == 'false') {
		menu.setAttribute('data-collapse', 'true'), toggleMenu.setAttribute('data-open', 'false');
	} else {
		menu.setAttribute('data-collapse', 'false'), toggleMenu.setAttribute('data-open', 'true');
	}
});

// count menu items to give know the height of the nav when stacked
document.addEventListener('DOMContentLoaded', (event) => {
	const mainMenu = document.getElementById('hoofdmenu');
	let navItems = mainMenu.childElementCount;
	mainMenu.setAttribute('data-count', navItems);
	console.log(mainMenu);
	//document.querySelector('#mainnav').setAttribute('data-count', navItems);
});

class Accordion {
	constructor(domNode) {
		this.rootEl = domNode;
		this.buttonEl = this.rootEl.querySelector('button[aria-expanded]');

		const controlsId = this.buttonEl.getAttribute('aria-controls');
		this.contentEl = document.getElementById(controlsId);

		this.open = this.buttonEl.getAttribute('aria-expanded') === 'true';

		// add event listeners
		this.buttonEl.addEventListener('click', this.onButtonClick.bind(this));
	}

	onButtonClick() {
		this.toggle(!this.open);
	}

	toggle(open) {
		// don't do anything if the open state doesn't change
		if (open === this.open) {
			return;
		}

		// update the internal state
		this.open = open;

		// handle DOM updates
		this.buttonEl.setAttribute('aria-expanded', `${open}`);
		if (open) {
			this.contentEl.setAttribute('aria-hidden', 'false');
			//cru added for styling
			// this.contentEl.setAttribute('data-open', 'true');
		} else {
			this.contentEl.setAttribute('aria-hidden', 'true');
			//cru added for styling
			// this.contentEl.setAttribute('data-open', 'false');
		}
	}

	// Add public open and close methods for convenience
	open() {
		this.toggle(true);
	}

	close() {
		this.toggle(false);
	}
}

// init accordions
const accordions = document.querySelectorAll('.accordion div');
accordions.forEach((accordionEl) => {
	new Accordion(accordionEl);
});
