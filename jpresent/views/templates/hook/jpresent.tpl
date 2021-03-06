<script src="//cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>
{literal}
<!-- ScrollMagick -->
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.velocity.js"></script>
<!-- ./ScrollMagick -->
{/literal}


		<div class="row" id="descripciones03">
		</div>
		<div class="tam-content tam2-content" style="margin-top:20px;">
			<div class="tam2 tam" style="background: #f7f7f7;">
				<div style="text-align:center;">
					<h1 class="tam-h1" style="color:#7a7a7a;">
						{$jpresent_title}
					</h1>
					<p style="margin-bottom:0px">{$jpresent_subtitle}</p>
				</div>
			</div>
		</div>

		
		<div id="descripciones01" class="tam-content" >
			<div class="tam" style="background: #f7f7f7;">
				<div class="row" style="max-width:1200px;width:100%;">
					<div class="col-md-6 col-sm-6 col-nomobil" style="overflow:hidden;padding-0px;">
						<div id="pin1" class="box2 blue no-java-si-center">
							{if $jpresent_img_acti==true}
								<img height="100%" src="{$jpresent_imagen_png|escape:'html':'UTF-8'}" />
							{else}
								<img height="100%" src="{$jpresent_imagen|escape:'html':'UTF-8'}" />
							{/if}
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<div class="no-java-si-center" style="margin-top:20px;padding:10px;">

							<h5 style="font-weight: bold;font-size:33px;color:#7a7a7a;text-shadow: 2px 2px 5px #929292;letter-spacing: 2px;">DESCRIPCI&Oacute;N</h5>
							<div id="trigger1" class="spacer s0"></div>
							<div>
								<div class="rte" style="font-size:18px;text-align: left;line-height: 25px;">{$product->description_short nofilter}</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="trigger2" class="spacer s0"></div>
		<div id="descripciones02" class="tam-content">

			<div class="tam" style="background: #f7f7f7;padding-top:100px;padding-bottom:50px;">
				<div class="row" style="max-width:1200px;width:100%;">

					
					<div class="{if $jpresent_imagen2!=''} col-md-6 col-sm-6 {else}  col-md-12 col-sm-12 {/if}">

						<div style="padding:10px;" class="no-java-si-center">

							<h5 style="font-weight: bold;color:#7a7a7a;font-size:33px;text-shadow: 2px 2px 5px #929292;letter-spacing: 2px;">FICHA T&Eacute;CNICA</h5>

							<div>
								<div class="rte" style="font-size:18px;">{$product->description nofilter}</div>
							</div>

						</div>

					</div>
					{if $jpresent_imagen2!=''}
					<div class="col-md-6 col-sm-6 col-nomobil" style="overflow:hidden;padding-0px;">
						<div id="pin2" class="box2 blue no-java-si-center" style="opacity:0;">
							{if $jpresent_img_acti==true}
								<img height="100%" src="{$jpresent_imagen_png2|escape:'html':'UTF-8'}" />
							{else}
								<img height="100%" src="{$jpresent_imagen2|escape:'html':'UTF-8'}" />
							{/if}
						</div>
					</div>
					{/if}
					
				</div>
			</div>
		</div>
		 
		<link rel="stylesheet" href="{$jpresent_css}">
		{if $jpresent_ancho==true}
			<script async src="{$jpresent_js}"></script>
		{else}
			{literal}
				<style>
					.no-java-si-center{
						text-align:center!important;
					}
				</style>
			{/literal}
		{/if}

{literal}
<script>
var controller1;
var controller2;
var scene1;
var scene2;
	setTimeout(function(){
		controller1 = new ScrollMagic.Controller();
		scene1 = new ScrollMagic.Scene({triggerElement: "#trigger1", duration: 300})
			.setPin("#pin1")
			.addTo(controller1);
	}, 2000);
	setTimeout(function(){
		controller2 = new ScrollMagic.Controller();
		scene2 = new ScrollMagic.Scene({triggerElement: "#trigger2"})
			.setVelocity("#pin1", {opacity: 0}, {duration: 400})
			.addTo(controller2);
	}, 2200);
	setTimeout(function(){
		controller2 = new ScrollMagic.Controller();
		scene2 = new ScrollMagic.Scene({triggerElement: "#trigger2"})
			.setVelocity("#pin2", {opacity: 100}, {duration: 400})
			.addTo(controller2);
	}, 2200);
</script>
{/literal}          