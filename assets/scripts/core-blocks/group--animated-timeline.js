
/**
 * Initializes an Intersection Observer to add the 'loaded' class to elements when they become visible in the viewport.
 * The Intersection Observer is set up to observe elements with the class 'animated__item'.
 * 
 * @listens DOMContentLoaded
 */
document.addEventListener( 'DOMContentLoaded', () => {
	const els = document.querySelectorAll( '.animated__item' );

	const observerOptions = {
		root: null,
		rootMargin: '0px',
		threshold: 0.33,
	};

	/**
	 * Callback function for the Intersection Observer.
	 * Adds the 'loaded' class to the target element if it is intersecting.
	 *
	 * @param {IntersectionObserverEntry[]} entries - An array of IntersectionObserverEntry objects.
	 */
	function observerCallback( entries ) {
		entries.forEach( ( entry ) => {
			if ( entry.isIntersecting ) {
				entry.target.classList.add( 'loaded' );
			}
		} );
	}

	const observer = new IntersectionObserver(
		observerCallback,
		observerOptions
	);

	els.forEach( ( el ) => observer.observe( el ) );
} );