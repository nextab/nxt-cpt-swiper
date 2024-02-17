# nxt-cpt-swiper
Most of what you need to create a slider with the popular Swiper JavaScript library in WordPress.

# Usage:
- edit the name of the shortcode you want to use (twice) in nxt-cpt-swiper.php
- adjust $query_args in nxt-cpt-swiper.php to adapt to your needs
- change the settings for the slider in js/nxt-swiper-initializer.js - see https://swiperjs.com/swiper-api for reference
- upload plugin
- use the shortcode and display your custom post type in a swiper slider!

## livestream examples
- initial setup (roughly 100 minutes) - https://www.youtube.com/live/7aIwv4d2OpA?si=ZGsqx-PQcDwDX1j4&t=4662
- fine-tuning design for Licutherm - https://www.youtube.com/watch?v=oQZtOoR5HKQ
- setting up a testimonial slider for Cedura - https://www.youtube.com/watch?v=anLHFC1Hkn8

# Example SCSS for client logos (can be seen on Cedura.de):

```
/* #region Swiper Testimonials */
.nxt-swiper {
	--swiper-wrapper-transition-timing-function: linear;
	.testimonial_img_container {
		align-items: center;
		aspect-ratio: 4/3;
		background-color: #fff;
		display: flex;
		flex-flow: column nowrap;
		justify-content: center;
		max-height: 80px;
		padding: 5px;
		position: relative;
		img.testimonial_image {
			max-height: 100%;
		}
	}
}
/* #endregion Swiper Testimonials */
```

# Example SCSS for a sliding project listing (can be seen soon on Licutherm.de):

```
/* #region Swiper Slider */
.et_pb_row.slider-row {
	margin-left: max(7.5%, calc(50vw - 750px));
	max-width: min(92.5%, calc(50vw + 750px));
	width: 92.5%;
	/* #region max-width 479px */
	@media only screen and (max-width: 479px) {
		margin-left: 5%;
	}
	/* #endregion 479px */
	.post_thumbnail {
		aspect-ratio: 16/10;
		border-radius: 0.75rem;
		margin-bottom: 1rem;
		overflow: hidden;
		position: relative;
		width: 100%;
		img {
			height: 100%;
			left: 0;
			object-fit: cover;
			position: absolute;
			top: 0;
			width: 100%;
		}
	}
	.meta_container {
		position: absolute;
		right: 1.25rem;
		text-align: right;
		top: 1.25rem;
		span {
			background-color: $white;
			border-radius: 0.625rem;
			color: #36500C;
			display: inline-block;
			font-size: 0.875rem;
			line-height: 1em;
			margin-bottom: 1rem;
			margin-left: 1rem;
			padding: 0.9375rem 1.25rem 0.875rem;
			pointer-events: none;
			/* #region max-width 980px */
			@media only screen and (max-width: 980px) {
				padding: 0.6875rem 1rem 0.625rem;
			}
			/* #endregion 980px */
			a {
				color: #36500C;
			}
		}
		.project_categories span {
			background-color: #D6E5BE;
		}
	}
}
.nxt-swiper {
	.swiper-button-next, .swiper-button-prev {
		right: 3rem;
		top: 45%;
		&::after {
			aspect-ratio: 1/1;
			background-color: $black;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0.36 0.28 16.83 14.73'%3E%3Cpath d='M1.35913 6.64355C0.806846 6.64355 0.359131 7.09127 0.359131 7.64355C0.359131 8.19584 0.806846 8.64355 1.35913 8.64355L1.35913 6.64355ZM16.8947 8.35066C17.2852 7.96014 17.2852 7.32697 16.8947 6.93645L10.5307 0.572487C10.1402 0.181962 9.50701 0.181962 9.11649 0.572487C8.72597 0.963011 8.72597 1.59618 9.11649 1.9867L14.7733 7.64355L9.11649 13.3004C8.72597 13.6909 8.72597 14.3241 9.11649 14.7146C9.50701 15.1051 10.1402 15.1051 10.5307 14.7146L16.8947 8.35066ZM1.35913 8.64355H16.1876V6.64355L1.35913 6.64355L1.35913 8.64355Z' fill='white'/%3E%3C/svg%3E");
			background-position: center;
			background-repeat: no-repeat;
			background-size: 1.25rem;
			border-radius: 0.5rem;
			border: none;
			content: "";
			height: 4rem;
			width: 4rem;
			/* #region max-width 980px */
			@media only screen and (max-width: 980px) {
				height: 3rem;
				width: 3rem;
			}
			/* #endregion 980px */
		}
		/* #region max-width 550px */
		@media only screen and (max-width: 550px) {
			display: none;
		}
		/* #endregion 550px */
	}
	.swiper-button-prev {
		right: auto;
		left: -1rem;
		&::after {
			transform: scalex(-1);
		}
	}
}
/* #endregion Swiper Slider */
```
