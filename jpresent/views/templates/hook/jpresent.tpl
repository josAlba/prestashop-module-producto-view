
		<div class="row" id="descripciones03">
		</div>
		<div class="tam-content tam2-content" style="margin-top:20px;">
			<div class="tam2 tam" style="background: #f7f7f7;">
				<div>
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
						<img height="100%" src="{$jpresent_imagen_png|escape:'html':'UTF-8'}" />
					</div>
					<div class="col-md-6 col-sm-6">

						<div style="margin-top:20px;padding:10px;">

							<h5 style="font-weight: bold;font-size:33px;color:#7a7a7a;text-shadow: 2px 2px 5px #929292;letter-spacing: 2px;">DESCRIPCI&Oacute;N</h5>

							<div>
								<div class="rte" style="font-size:18px;text-align: left;line-height: 25px;">{$product->description_short}</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>

		<div id="descripciones02" class="tam-content">

			<div class="tam" style="background: #f7f7f7;">
				<div class="row" style="max-width:1200px;width:100%;">
					<div class="col-md-12 col-sm-12">

						<div style="margin-top:50px;padding:10px;">

							<h5 style="font-weight: bold;color:#7a7a7a;font-size:33px;text-shadow: 2px 2px 5px #929292;letter-spacing: 2px;">FICHA T&Eacute;CNICA</h5>

							<div>
								<div class="rte" style="font-size:18px;">{$product->description}</div>
							</div>

						</div>

					</div>
					
				</div>
			</div>
		</div>
		
		<link rel="stylesheet" href="{$jpresent_css}">
		<script async src="{$jpresent_js}"></script>
                  