/* Hack from http://browserhacks.com/ */
if (/constructor/i.test(window.HTMLElement)) {
	document.getElementsByTagName('html')[0].className += ' isSafari';
}