		/* ~copied dari sistem guest~
		** last updated 12 Dis 2012
		** Noorulfaiz@gmail.com
		**
		*/		

		/* ni messege error untuk basic function jquery validate. 
		** translate di sini sahaja & bukan di core fail jquery.validate.js. 
		** kalau ada version baru fail itu, tak perlu kacau dah
		*/

		$.extend($.validator.messages, {
			  required: "Ruangan ini perlu diisi",
			  remote: 'Perlu dibetulkan',
			  email: 'Alamat emel tidak sah',
			  url: 'URL tidak sah',
			  date: 'Tarikh tidak sah',
			  dateISO: 'Tarikh tidak sah (ISO)',
			  number: 'Nombor tidak sah',
			  digits: 'Dalam format digit sahaja',
			  creditcard: 'Nombor kad kredit tidak sah',
			  equalTo: 'Masukkan nilai yang sama sekali lagi',
			  accept: 'Sila masukkan nilai sambungan yang sah',
			  maxlength: jQuery.validator.format('Mestilah lebih dari {0} huruf'),
			  minlength: jQuery.validator.format('Mestilah sekurangnya {0} huruf'),
			  rangelength: jQuery.validator.format('Panjang huruf mestilah diantara {0} dan {1}'),
			  range: jQuery.validator.format('Nilai mesti diantara {0} dan {1}'),
			  max: jQuery.validator.format('Nilai mesti kurang atau sama dengan {0}'),
			  min: jQuery.validator.format('Nilai mesti lebih besar atau sama to {0}')
			});
			
		//kegunaan bootstrap create error message. 
			$.extend($.validator.prototype, {
			  showLabel: function(element, message) {
				var label = this.errorsFor( element );
			
				if (label.length == 0) {
				  var railsGenerated = $(element).next('span.help-inline');
				  if (railsGenerated.length) {
					railsGenerated.attr('for', this.idOrName(element))
					railsGenerated.attr('generated', 'true');
					label = railsGenerated;
				  }
				}
			
				if (label.length) {
				  // refresh class jadi error/success
				  label.removeClass(this.settings.validClass).addClass(this.settings.errorClass);
				  // kalau dah generate label, gantikan message
				  label.attr('generated') && label.html(message);
				} else {
				  // create label
				  label = $('<' + this.settings.errorElement + '/>')
					.attr({'for':  this.idOrName(element), generated: true})
					.addClass(this.settings.errorClass)
					.addClass('help-inline')
					.html(message || '');
				  if (this.settings.wrapper) {
					
					label = label.hide().show().wrap('<' + this.settings.wrapper + '/>').parent();
				  }
				  if (!this.labelContainer.append(label).length)
					this.settings.errorPlacement
					  ? this.settings.errorPlacement(label, $(element))
					  : label.insertAfter(element);
				}
				if (!message && this.settings.success) {
				  label.text('');
				  typeof this.settings.success == 'string'
					? label.addClass(this.settings.success)
					: this.settings.success(label);
				}
				this.toShow = this.toShow.add(label);
			  }
			});

			//tambahan method dan error message. kalau ada penambahan method (regex) tambah kat sini.
			//dinasihatkan method yg global atau umum sahaja. kalau kegunaan utk page sendiri sahaja create 1 fail js lain yer..

			$.validator.addMethod('nofreeemail', function (value) {
			return /^([\w-\.]+@(?!gmail.com)(?!yahoo.com)(?!hotmail.com)([\w-]+\.)+[\w-]{2,4})?$/.test(value);
			}, 'hanya alamat rasmi dibenarkan.');

			$.validator.addMethod("malaysianDate",function(value, element) {	        
				return value.match(/^(?:(?:(?:(?:31\/(?:0?[13578]|1[02]))|(?:(?:29|30)\/(?:0?[13-9]|1[0-2])))\/(?:1[6-9]|[2-9]\d)\d{2})|(?:29\/0?2\/(?:(?:(1[6-9]|[2-9]\d)(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))|(?:0?[1-9]|1\d|2[0-8])\/(?:(?:0?[1-9])|(?:1[0-2]))\/(?:(?:1[6-9]|[2-9]\d)\d{2}))$/);
			},"Masukkan format dd/mm/yyyy");

			$.validator.addMethod("alphanumeric", function(value, element) {
				return this.optional(element) || /^\w+$/i.test(value);
			}, "Huruf, nombor dan underscore sahaja");

			$.validator.addMethod("lettersonly", function(value, element) {
				return this.optional(element) || /^[a-z]+$/i.test(value);
			}, "Huruf Sahaja");

			$.validator.addMethod("integer", function(value, element) {
				return this.optional(element) || /^-?\d+$/.test(value);
			}, "Integer sahaja (bukan decimal)");


			//function bawah ni supaya boleh panggil guna class validate utk setiap form yg kita create
			// kalau nak create function sendiri pun boleh either guna class atau by id form element.
            //$(document).ready(function() 
            //{ 	


			$('.validate').each(function () {
				$(this).validate({
				errorClass: 'error',
				validClass: 'success',
				errorElement: 'span',
				
				//highlight -> tambah class error dalam control group termasuk yg guna append dan prepend class
				highlight: function(element, errorClass, validClass) {
				if (element.type === 'radio') {
				this.findByName(element.name).parent('div').parent('div').removeClass(validClass).addClass(errorClass);
				} else if($(element).parent('div.input-prepend, div.input-append').length > 0) {
				$(element).parent('div').parent('div').parent('div').removeClass(validClass).addClass(errorClass);
				} else {
				$(element).parent('div').parent('div').removeClass(validClass).addClass(errorClass);
				}
				},
				//unhighlight -> hapuskan class error dalam control group termasuk yg guna append dan prepend class
				unhighlight: function(element, errorClass, validClass) {
				if (element.type === 'radio') {
				this.findByName(element.name).parent('div').parent('div').removeClass(errorClass).addClass(validClass);
				} else if($(element).parent('div.input-prepend, div.input-append').length > 0) {
				$(element).parent('div').parent('div').parent('div').removeClass(errorClass).addClass(validClass);
				$(element).next('span.help-inline').text('');
				} else {
				$(element).parent('div').parent('div').removeClass(errorClass).addClass(validClass);
				$(element).next('span.help-inline').text('');
				}
				}
				});
			});
             //});
 