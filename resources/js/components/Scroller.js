
export default {


    methods: {
    

            scrollTo: function(id) {
                var elmnt = document.getElementById(id);
                var height = window.innerHeight
                    || document.documentElement.clientHeight
                    || document.body.clientHeight;
                var scrollTo = window.pageYOffset + elmnt.getBoundingClientRect().top;
                //var scrollTo = elmnt.getBoundingClientRect().top - 50;

				var cosParameter = (window.pageYOffset - scrollTo) / 2,
					scrollCount = 0,
					oldTimestamp = window.performance.now();

				function step(newTimestamp) {

					var tsDiff = newTimestamp - oldTimestamp;

					// Performance.now() polyfill loads late so passed-in timestamp is a larger offset
					// on the first go-through than we want so I'm adjusting the difference down here.
					// Regardless, we would rather have a slightly slower animation than a big jump so a good
					// safeguard, even if we're not using the polyfill.

					if (tsDiff > 100) {
						tsDiff = 30;
					}

					scrollCount += Math.PI / (1000 / tsDiff);

					// As soon as we cross over Pi, we're about where we need to be

					if (scrollCount >= Math.PI) {
						return;
					}

					var moveStep = Math.round(scrollTo + cosParameter + cosParameter * Math.cos(scrollCount));
					window.scrollTo(0, moveStep);
					oldTimestamp = newTimestamp;
					window.requestAnimationFrame(step);
				}

				window.requestAnimationFrame(step);

            }
    
    
    }



}
