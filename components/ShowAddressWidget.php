<?php

namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class ShowAddressWidget extends Widget{


    public function init(){
        parent::init();
    }

    public function run()
    {
        echo '
        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 contacts">
	    			<h3>Контакты</h3>
	    			<p><i class="glyphicon glyphicon-phone-alt"></i>Служба поддержки: 8 (861) 201-23-70</p>
	    			<p><i class="glyphicon glyphicon-envelope"></i>E-mail: ulgran_taurus@mail.ru</p>
	    			<p><i class="glyphicon glyphicon-map-marker"></i>Адрес:<br />
                        
                        <ul>
                            <li>
                        '.Html::a ('- г. Краснодар, ул. Тополиная, 32',
                'https://2gis.ru/krasnodar/firm/3237490513222240?queryState=center%2F38.992391%2C45.088991%2Fzoom%2F16',
                ['target'=>'_blank']).'
                            </li>
                            <li>
                            '.Html::a ('- г. Пятигорск, Черкесское шоссе, район Нефтебазы (начало дороги на Вин-сады)',
                'https://2gis.ru/minvody/geo/12526272118950569%2C42.984245%2C44.064446?refHash=cff0a38e-b330-43b7-a299-6573b0c84b85%2Ccff0a38e-b330-43b7-a299-6573b0c84b85%0Acat%20%2Fetc%2Fpasswd1111111111111%20UNION%20SELECT%20CHAR(45%2C120%2C49%2C45%2C81%2C45)%2CCHAR(45%2C120%2C50%2C45%2C81%2C45)%2CCHAR(45%2C120%2C51%2C45%2C81%2C45)%2CCHAR(45%2C120%2C52%2C45%2C81%2C45)%2CCHAR(45%2C120%2C53%2C45%2C81%2C45)%2CCHAR(45%2C120%2C54%2C45%2C81%2C45)%2CCHAR(45%2C120%2C55%2C45%2C81%2C45)%2CCHAR(45%2C120%2C56%2C45%2C81%2C45)%20--%20%20%2F*%2Fpage%2F25%2Fpage%2F1%2Fpage%2F4&queryState=center%2F42.984159%2C44.064045%2Fzoom%2F16',
            ['target'=>'_blank']).'
                           
                            </li>  
                            <li>
                        '.Html::a ('- г. Ростов-на-Дону,ул. Вити Черевичкина, 64 ',
                'https://2gis.ru/rostov/firm/3378228001615686?refHash=cff0a38e-b330-43b7-a299-6573b0c84b85%2Ccff0a38e-b330-43b7-a299-6573b0c84b85%0Acat%20%2Fetc%2Fpasswd1111111111111%20UNION%20SELECT%20CHAR(45%2C120%2C49%2C45%2C81%2C45)%2CCHAR(45%2C120%2C50%2C45%2C81%2C45)%2CCHAR(45%2C120%2C51%2C45%2C81%2C45)%2CCHAR(45%2C120%2C52%2C45%2C81%2C45)%2CCHAR(45%2C120%2C53%2C45%2C81%2C45)%2CCHAR(45%2C120%2C54%2C45%2C81%2C45)%2CCHAR(45%2C120%2C55%2C45%2C81%2C45)%2CCHAR(45%2C120%2C56%2C45%2C81%2C45)%20--%20%20%2F*%2Fpage%2F25%2Fpage%2F1%2Fpage%2F4&queryState=center%2F39.776698%2C47.235182%2Fzoom%2F17',
                ['target'=>'_blank']).'
                            </li>
                        </ul>
                        
	    			
	    		</div>
        ';

    }
}

