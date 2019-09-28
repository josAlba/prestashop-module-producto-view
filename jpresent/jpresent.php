<?php
    
    if(!defined('_PS_VERSION_')){ exit(); }
    
    class jpresent extends Module{

        public function __construct()
        {
            $this->name = 'jpresent';
            $this->tab = 'front_office_features';
            $this->version = '1.0.0';
            $this->author ='JosAlba';
            $this->need_instance = 0;
            $this->ps_versions_compliancy = array('min' => '1.6.x.x', 'max' => _PS_VERSION_);

            $config = Configuration::getMultiple ( array (
                'JPRESENT_TITLE',
                'JPRESENT_SUBTITLE',
                'JPRESENT_IMAGE_ACTIVE',
                'JPRESENT_IMAGE_ALPHA'
            ) );

            parent::__construct();

            $this->displayName = $this->l('JPresent');
            $this->description = $this->l('Muestra una presentacion del producto');
            $this->confirmUninstall = $this->l('¿Estás seguro de que quieres desinstalar el módulo?');
        }

        public function install(){

            
            if(!parent::install()
                || !$this->registerHook('displayFooterProduct')
                || !Configuration::updateValue ( 'JPRESENT_IMAGE_ALPHA', '90' )
            ){
                return false;
            }
            
            //$this->emptyTemplatesCache();
            
            return true;
        }
        public function uninstall(){

            //$this->_clearCache('*');
            
            if(!parent::uninstall() || !$this->unregisterHook('displayFooterProduct')){
                return false;
            }
                 
            return true;
        }
        public function getContent(){

            $output = null;
            if (Tools::isSubmit('submit'.$this->name)){

                $myModuleName = strval(Tools::getValue('TITLE'));

                if (!$myModuleName ||
                    empty($myModuleName) ||
                    !Validate::isGenericName($myModuleName)
                ){
                    $output .= $this->displayError($this->l('Invalid Configuration value'));
                }else{
                    Configuration::updateValue('JPRESENT_TITLE',        $myModuleName);
                    Configuration::updateValue('JPRESENT_SUBTITLE',     Tools::getValue('SUBTITLE'));
                    Configuration::updateValue('JPRESENT_IMAGE_ACTIVE', Tools::getValue('IMAGE_ACTIVO'));
                    Configuration::updateValue('JPRESENT_IMAGE_ALPHA',  Tools::getValue('IMAGE_ALPHA'));

                    $output .= $this->displayConfirmation($this->l('Settings updated'));
                }
            }

            return $output.$this->displayForm();

        }
        public function displayForm(){
            $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

            $fields_form = array();
            $fields_form[0]['form'] = array(
                'legend' => array(
                    'title' => $this->l('jPresent'),
                    'icon'  => 'icon-folder-close'
                ),
                'input' => array(
                    array(
                        'type' => 'html',
                        'html_content' => '<strong>Configuracion</strong><br>',
                        'name' => 'hrseparate1',
                    ),
                    array(
                        'type'  => 'text',
                        'label' => $this->l('TITLE : '),
                        'name'  => 'TITLE',
                        'size'  => 20,
                        'required' => true
                    ),
                    array(
                        'type'  => 'text',
                        'label' => $this->l('SubTITLE : '),
                        'name'  => 'SUBTITLE',
                        'size'  => 20,
                        'required' => true
                    ),
                    array(
                        'type' => 'html',
                        'html_content' => '<strong>Configuracion Imagen</strong><br>',
                        'name' => 'hrseparate1',
                    ),
                    array(
                        'type'  => 'checkbox',
                        'label' => $this->l('Activar fondo alpha'),
                        'name'  => 'IMAGE',
                        'values' => array(
                            'query' => $lesChoix = array(
                              array(
                                  'check_id' => 'ACTIVO',
                                  'name' => $this->l('Activo'),
                              )
                            ),
                            'id' => 'check_id',
                            'name' => 'name',
                            'desc' => $this->l('Please select')
                        )
                    ),
                    array(
                        'type'  => 'text',
                        'label' => $this->l('Densidad Alpha % : '),
                        'name'  => 'IMAGE_ALPHA',
                        'size'  => 20,
                        'required' => true
                    )

                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'class' => 'btn btn-default pull-right'
                )
            );

            $helper = new HelperForm();
            // Module, token and currentIndex
            $helper->module = $this;
            $helper->name_controller = $this->name;
            $helper->token = Tools::getAdminTokenLite('AdminModules');
            $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

            // Language
            $helper->default_form_language = $default_lang;
            $helper->allow_employee_form_lang = $default_lang;

            // Title and toolbar
            $helper->title          = $this->displayName;
            $helper->show_toolbar   = false; 
            $helper->toolbar_scroll = false;
            $helper->submit_action  = 'submit'.$this->name;
            $helper->toolbar_btn    = array(
                'save' =>
                array(
                    'desc' => $this->l('Save'),
                    'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.
                    '&token='.Tools::getAdminTokenLite('AdminModules'),
                ),
                'back' => array(
                    'href' => AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'),
                    'desc' => $this->l('Back to list')
                )
            );

            $helper->fields_value['TITLE']          = Configuration::get('JPRESENT_TITLE');
            $helper->fields_value['SUBTITLE']       = Configuration::get('JPRESENT_SUBTITLE');
            $helper->fields_value['IMAGE_ACTIVO']   = Configuration::get('JPRESENT_IMAGE_ACTIVE');
            $helper->fields_value['IMAGE_ALPHA']    = Configuration::get('JPRESENT_IMAGE_ALPHA');

            return $helper->generateForm($fields_form);
        }

        
        public function hookDisplayFooterProduct($params){
           
            //$this->context->controller->addJS($this->_path.'js/jpresent.js', 'all');
            //$this->context->controller->addCSS($this->_path.'css/jpresent.css', 'all');

            $product = $this->context->controller->getProduct();
            $imagen1 = Product::getCover((int) Tools::getValue('id_product'));
            $imagen1 = $this->context->link->getImageLink($product->link_rewrite, $imagen1['id_image'], 'medium_default');
            
            $this->context->smarty->assign(array(
                'jpresent_title'        => Configuration::get('JPRESENT_TITLE'),
                'jpresent_subtitle'     => Configuration::get('JPRESENT_SUBTITLE'),
                'jpresent_img_acti'     => Configuration::get('JPRESENT_IMAGE_ACTIVE'),
                'jpresent_imagen'       => $imagen1,
                'jpresent_imagen_png'   =>$this->_path.'img.php?i='.$imagen1,
                'jpresent_css'          => $this->_path.'css/jpresent.css',
                'jpresent_js'           => $this->_path.'js/jpresent.js',
            ));

            return $this->display(__FILE__, 'jpresent.tpl');
        }
        
    }