<?php
namespace AMAUC;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;
use MapasCulturais\i;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $app = App::i();
        $self = $app->view;
        $url_search_agents = $self->searchAgentsUrl;
        $url_search_spaces = $self->searchSpacesUrl;
        $url_search_events = $self->searchEventsUrl;
        $url_search_projects = $self->searchProjectsUrl;

        return [
           'site: name' => 'Mapas da AMAUC',
        //    'site: description' => App::i()->config['app.siteDescription'],
           'site: in the region' => 'na AMAUC',
           'site: of the region' => 'da AMAUC',
           'site: owner' => 'AMAUC',
           'site: by the site owner' => 'pela AMAUC',
//
           'home: title' => i::__("Bem-vind@!"),
           'home: abbreviation' => "plataforma Mapas da AMAUC",
           'home: colabore' => i::__('Participe'),
           'home: welcome' => i::__("O Mapa Cultural da AMAUC, Associação dos Municípios do Alto Uruguai Catarinense, é uma plataforma livre, colaborativa e interativa de mapeamento do cenário cultural catarinense, além de ser um instrumento de governança digital no aprimoramento da gestão pública, dos mecanismos de participação e da democratização do acesso às políticas culturais promovidas pelas Secretarias, Superintendências e Diretorias de Cultura dos 14 municípios que compõe a AMAUC. <br><br>
           É uma ferramenta de comunicação - através dos eventos presentes no calendário cultural, os projetos desenvolvidos e os espaços promovidos pelos agentes e instituições culturais. É uma plataforma de acesso e execução dos editais realizados pelos gestores culturais da região da AMAUC, bem como de outras oportunidades de demais agentes e espaços culturais.<br><br>
           Você também pode colaborar na gestão da cultura da região da AMAUC. Para  participar deste  processo, basta criar seu perfil de agente cultural.
           Este  perfil  é  criado a  partir de  um cadastro. Assim, fica mais fácil participar dos editais e programas das Secretarias, Superintendências e Diretorias de Cultura e também divulgar seus eventos, espaços ou projetos.
           Participe!!<br><br>
           "),
//            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
//            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural da região. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
//            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
//            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
//            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/documentation/docs/mc_config_api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',
//
//            'search: verified results' => 'Resultados Verificados',
//            'search: verified' => "Verificados"
        ];
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });

        // impede o download automático dos arquivos privados
        $app->hook('GET(file.privateFile).headers', function(&$headers){
            if(isset($headers['Content-Disposition']) && strpos($headers['Content-Disposition'], '.pdf')){
                unset($headers['Content-Description']);
                $headers['Content-Disposition'] = str_replace('attachment; ', '', $headers['Content-Disposition']);
            }
        });

        
        $app->hook('mapasculturais.styles', function() use ($app) {
            $view = $app->view;

            $imagesList = [];
            $path = __DIR__."/assets/img/randHome/";
            $files = dir($path);

            while($_file = $files->read()){
                if ($_file != '.' && $_file != '..') {
                    $imagesList[] = $view->asset("img/randHome/{$_file}", false);
                }
            }

            $files->close();

            shuffle($imagesList);

            $images = [
                'home-agents' => $imagesList[0],
                'home-developers' => $imagesList[1],
                'home-events' => $imagesList[2],
                'home-opportunities' => $imagesList[4],
                'home-projects' => $imagesList[5],
                'home-spaces' => $imagesList[6],
            ];

            $images['home-intro'] = $view->asset('img/home--intro.jpg', false);

            $app->view->part('amauc-css', ['images' => $images]);
        });
    }

    protected function _publishAssets() {
        $this->asset('img/home--agents.jpg', false);
        $this->asset('img/home--developers.jpg', false);
        $this->asset('img/home--events.jpg', false);
        $this->asset('img/home--intro.jpg', false);
        $this->asset('img/home--opportunities.jpg', false);
        $this->asset('img/home--projects.jpg', false);
        $this->asset('img/home--spaces.jpg', false);
        $this->asset('img/logo-site.png', false);

        $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/logo-instituicao.png', false);
    }


    // protected function _getFilters(){
    //     $filters = parent::_getFilters();


    //     $filters['agent'] = [
    //         'paises' => [
    //             'label' => i::__('Países'),
    //             'placeholder' => i::__('Países'),
    //             'fieldType' => 'singleselect',
    //             'filter' => [
    //                 'param' => 'En_Pais',
    //                 'value' => 'IN({val})'
    //             ]
    //         ],
    //         'area' => $filters['agent']['area'],
    //         'tipos' => $filters['agent']['tipos'],
    //         'verificados' => $filters['agent']['verificados']
    //     ];

    //     $filters['space'] = [
    //         'paises' => [
    //             'label' => i::__('Países'),
    //             'placeholder' => i::__('Países'),
    //             'fieldType' => 'singleselect',
    //             'filter' => [
    //                 'param' => 'En_Pais',
    //                 'value' => 'IN({val})'
    //             ]
    //         ],
    //         'area' => $filters['space']['area'],
    //         'tipos' => $filters['space']['tipos'],
    //         'acessibilidade' => $filters['space']['acessibilidade'],
    //         'verificados' => $filters['space']['verificados']
    //     ];

    //     return $filters;
    // }

}
