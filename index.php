<?php include('templates/header.php'); ?>
	<div id="c">
	
		
			<div id='index-banner' class='parallax-container'>
			  <div class='section no-pad-bot'>
				<div class='container'>
				  <br><br>
				  <h1 class='header center teal-text text-lighten-2'><img src="templates/pics/aboitiz.png" style="width:50%; height: 50%;"></h1>
				  <div class='row center'>
					<h5 class='header col s12 light black-text'><i>Made for Life</i></h5>
				  </div>
				  <br><br>
		  
				</div>
			  </div>
			  <div class='parallax'><img src='/static/1.png' alt='Unsplashed background img 1'></div>
			</div>
		  
<!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->		  
				<div class="icons" style="
					/*
					@media(min-width: 301px) and (max-width: 600px){
						background-image:url(templates/pics/background.png);
					}
					@media(min-width: 601px){
						background-image:url(templates/pics/bg.png);
					}*/
					background-image:url(templates/pics/bg.png);
					background-attachment: fixed;">
			<div class='container'>
			  <div class='section'>
		  
				<!--   Icon Section   -->
				<div class='row'>
				  <div class='col s12 m4'>
					<div class='icon-block'>
					  <h2 class='center brown-text'><i class='material-icons'>flash_on</i></h2>
					  <h5 class='center'>Commitment</h5>
		  
					  <p class='light'>Today, AEV is recognized as one of the best-managed companies in the Philippines and in the region and is consistently cited for its commitment to good corporate governance and corporate social responsibility. With five generations of Aboitiz Group business success behind it, AEV is moving forward, pursuing its vision to be a truly sustainable enterprise that can be entrusted to future generations.</p>
					</div>
				  </div>
		  
				 <div class="icons">
				  <div class='col s12 m4'>
					<div class='icon-block'>
					  <h2 class='center brown-text'><i class='material-icons'>group</i></h2>
					  <h5 class='center'>Trustworthy</h5>
		  
					  <p class='light'>Aboitiz Land, Inc. is engaged in the design and development of distinct communities for residential, industrial, and commercial use. After over two decades in operation, it is today one of the country’s most trusted companies in real estate development. It continues to strengthen its position by expanding geographically through land banking in key growth areas across the country while continuously delivering dream homes and commercial spaces.</p>
					</div>
				  </div>
		  
				  <div class='col s12 m4'>
					<div class='icon-block'>
					  <h2 class='center brown-text'><i class='material-icons'>settings</i></h2>
					  
		  
					  <p class='light'>In 2014, Cebu’s homegrown real estate developer kicked-off its national operation by acquiring LiMA Land, developer of the 590-hectare LiMA Technological Center in Batangas. Today, the Land Group is geared towards growth in all of its business units, aiming to become a stronger player in the national real estate scene by curating communities that ensure better lives.</p>
					</div>
				  </div>
				</div>
		  		</div>
			  </div>
			</div>
		  	
			<div class='parallax-container valign-wrapper'>
			<div><img src="templates/pics/aboitz.jpg" style="width:220%; height:220%; background-attachment:local;"></div>
			  <div class='section no-pad-bot'>
				<div class='container'>
				  <div class='row center'>
				  <h5 class='center' white-text'><i>Do it the Aboitiz Way!</i></h5>
				  </div>
				</div>
			  </div>
			  
			</div>
		  	
			<div class='container'>
			  <div class='section'>
		  
				<div class='row'>
				  <div class='col s12 center'>
					<h3><i class='mdi-content-send brown-text'></i></h3>
					<h4>Company Bio</h4>
					<p class='center light'><b>Aboitiz Equity Ventures, Inc.</b>, incorporated on September 11, 1989, is a holding and management company. The Company and its subsidiaries are engaged in various business activities in the Philippines, including power generation and distribution, food manufacturing, banking and financial services, real estate development and infrastructure. The Company also has portfolio investments in other companies. The Company's segments are power, which is engaged in power generation and sale of electricity; food manufacturing, which is engaged in the production of flour and feeds and swine breeding; financial services, which is engaged in banking and money remittance operations; real estate, which is engaged in real property development for sale and lease; infrastructure, which is engaged in the production of cement and other building materials and in the supply of treated bulk water, and the parent company and others, which include the operations of the Company and the service provider subsidiaries that cater mainly to the Group.
					</p>
				  </div>
				</div>
		  
			  </div>
			</div>
		  
		  	
			<div class='container'>
			  <div class='section'>
		  
				<div class='row'>
				  <div class='col s12 center'>
					<h3><i class='mdi-content-send brown-text'></i></h3>
					<h4>Contact us</h4>
					<p class='center light'>aboitizland@aboitiz.com<br>www.facebook.com/aboitizlandinc
					</p>
				  </div>
				</div>
		  
			  </div>
			</div>
		  

				<div class='row center'>
					<button id="btn" class="btn-large waves-effect waves-light red lighten-1">Get Started</button>
				</div>
			</div>
			</div>
	</div>
  <script>
	  window.onload = function(){
		  let html = '<div class="preloader-wrapper big active"><div class="spinner-layer spinner-red"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';
		  let $c = $('#c');
		  let prev = $c.html();
		  //$c.html(html);
		  /*setTimeout(() => {
			  $c.html(prev);*/
		  $btn = $('#btn');
		  $btn.click(function(event){
			swal.mixin({
				confirmButtonText: 'Next &rarr;',
				progressSteps: ['A', 'B', 'O', 'I', 'T', 'I', 'Z']
			}).queue([
			{
				title: 'Describe your dream home'
			},{
				title: 'How many rooms would you like?',
				input: 'select',
				html: '<i>Visualize how spacious you want your home to be. Let us find it for you!</i>',
				inputOptions: {	
					'1': '1 Bedroom',
					'2': '2 or more Bedrooms',
					'3': 'Plan it on your own lot'
				}
			},{
				title: 'Where would be the location?',
				input: 'select',
				html: '<i>looking a home in a good area is a long-term investment, and the location is one of the most important factors when home-hunting</i>',
				inputOptions: {
					'1': 'Northern Luzon',
					'2': 'Southern Luzon',
					'3': 'Outside Luzon'
				}
			},{
				title: 'What are the amenities included?',
				input: 'select',
				html: '<i>Amenities contributes greatly to the pleasure and enjoyment of you and your family.</i>',
				inputOptions: {
					'1': 'Swimming Pool',
					'2': 'Club House',
					'3': 'Recreational Parks'
				}
			},{
				title: 'House type',
				input: 'select',
				html: '<i>Choose your dream home according to your needs</i>',
				inputOptions: {
					'1': 'My primary home',
					'2': 'My vacation home',
					'3': 'Both'
				}
			},{
				title: 'How much are you willing to spend for your dream house?',
				input: 'select',
				html: '<i>Buying a home is a serious undertaking, especially when it comes to your personal finances. But we are here to provide you with options.</i>',
				inputOptions: {
					'1': '1,500,000 to 3,500,000',
					'2': '5,000,000 to 8,000,000',
					'3': '8,000,000 above'
				}
			},{
				title: 'Enter your full name',
				input: 'text'
			},{
				title: 'Enter your email address',
				input: 'email'
			},{
				title: 'Enter your contact number',
				input: 'number'
			},
			]).then((result) => {
				if (result.value) {
					/*
					swal({
					title: 'All done!',
					html:
						'Your answers: <pre><code>' +
						JSON.stringify(result.value) +
						'</code></pre>',
					confirmButtonText: 'Lovely!'
					})
					*/
					$.ajax({
						type: "POST",
						url: "<?= $base_url ?>/action/submitForm.php",
            data: { 'text': result.value },
						success: function (data) {
							//console.log(data);
              if(data == 'y'){
                swal({
                  type: 'success',
                  title: 'Congratulations!',
                  text: 'You have successfully put together your dream house. A sales representative will contact you shortly for the info of your dream house.'
                });
              }else{
                swal({
                  type: 'warning',
                  title: 'Warning!',
                  text: 'failed.'
                });
              }
						}
					});
				}
			})
		  });
		  //}, 5000);
	  };
	</script>

<?php include('templates/footer.php'); ?>