/**
 * messengerchat
 *
 * @copyright Copyright © 2018 Magenest. All rights reserved.
 * @author    sonstephendo@gmail.com
 */
define([
	'uiComponent',
	'ko',
	'jquery',
	'underscore'
], function (Component, ko, $) {
	'use strict';
	var self;
	return Component.extend({
		initialize: function () {
			self = this;
			this._super();
			// appID  import from components
			this.initChatBox();
		},
		getInfo: function () {
			var self = this;
			// only get email id name:
			FB.api('/me', 'GET', {fields: 'name, email, birthday, location, link, age_range'}, function (response) {
				document.getElementById('pic').src = 'https://graph.facebook.com/' + response.id +
					'/picture?width=40&height=40';
				document.getElementById('na_user').innerHTML = "Hi! " + response.name;
				
				var hasAge = response.hasOwnProperty('age_range');
				var hasLocation = response.hasOwnProperty('location');
				var hasBirthday = response.hasOwnProperty('birthday');
				var hasLink = response.hasOwnProperty('link');
				
				if (hasAge) {
					var hasMin = response.age_range.hasOwnProperty('min');
					var hasMax = response.age_range.hasOwnProperty('max');
				}
				
				var age, location, birthday, link;
				
				// validating and computing the response data;
				
				if (hasMin && hasMax) {
					age = Math.round((response.age_range.min + response.age_range.max)/2);
				} else if (hasMin) {
					age = response.age_range.min;
				} else if (hasMax) {
					age = response.age_range.max;
				} else {
					age = -1;
				}
				location = hasLocation ? response.location.name : "";
				birthday = hasBirthday ? response.birthday : "";
				link = hasLink ? response.link : "";
				
				self.getValue(response.email, response.name, birthday, location, link, age, response.id);
			});
		},
		getValue: function (c_email, c_name, c_birthday, c_location, c_link, c_age, c_id) {
			if (!c_email) {
				c_email = c_id + 'no email';
			}
			$.ajax({
				type: "POST",
				url: self.app_config.user_url + '?isAjax=true',
				data: {
					name_user: c_name,
					email_user: c_email,
					birthday_user: c_birthday,
					location_user: c_location,
					linkfb_user: c_link,
					age_user: c_age
				},
				showLoader: true,
				success: function () {
				}
			});
		},
		addBox: function () {
			var self = this;
			FB.getLoginStatus(function (response) {
				if (response.status === 'connected') {
					$('.un_login').hide();
					$('.is_login').show();
					self.getInfo();
				} else {
					$('.is_login').hide();
					$('.un_login').show();
				}
			});
		},
		initChatBox: function () {
			//set animation for open and close tab
			$(document).ready(function () {
				$(".title_open_chatbox").click(function () {
					$('.frm_chatbox').fadeIn();
					$('.title_open_chatbox').hide();
				});
				$(".title_close_chatbox").click(function () {
					$('.title_open_chatbox').fadeIn();
					$('.frm_chatbox').hide();
				});
			});
			//end set animation for open and close tab
			
			$("#openchat").click(function () {
				self.addBox();
				return false;
			});
		}
	});
});
