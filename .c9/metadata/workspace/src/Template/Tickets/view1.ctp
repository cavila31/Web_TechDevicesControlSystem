{"filter":false,"title":"view1.ctp","tooltip":"/src/Template/Tickets/view1.ctp","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":67,"column":74},"end":{"row":67,"column":75},"action":"insert","lines":["m"],"id":121}],[{"start":{"row":67,"column":75},"end":{"row":67,"column":76},"action":"insert","lines":["e"],"id":122}],[{"start":{"row":67,"column":76},"end":{"row":67,"column":77},"action":"insert","lines":["r"],"id":123}],[{"start":{"row":67,"column":77},"end":{"row":67,"column":78},"action":"insert","lines":["o"],"id":124}],[{"start":{"row":67,"column":78},"end":{"row":67,"column":79},"action":"insert","lines":[" "],"id":125}],[{"start":{"row":67,"column":79},"end":{"row":67,"column":80},"action":"insert","lines":["d"],"id":126}],[{"start":{"row":67,"column":80},"end":{"row":67,"column":81},"action":"insert","lines":["e"],"id":127}],[{"start":{"row":67,"column":82},"end":{"row":67,"column":88},"action":"remove","lines":["Equipo"],"id":128}],[{"start":{"row":67,"column":82},"end":{"row":67,"column":83},"action":"insert","lines":["b"],"id":129}],[{"start":{"row":67,"column":82},"end":{"row":67,"column":83},"action":"remove","lines":["b"],"id":130}],[{"start":{"row":67,"column":82},"end":{"row":67,"column":83},"action":"insert","lines":["B"],"id":131}],[{"start":{"row":67,"column":83},"end":{"row":67,"column":84},"action":"insert","lines":["o"],"id":132}],[{"start":{"row":67,"column":84},"end":{"row":67,"column":85},"action":"insert","lines":["l"],"id":133}],[{"start":{"row":67,"column":85},"end":{"row":67,"column":86},"action":"insert","lines":["e"],"id":134}],[{"start":{"row":67,"column":86},"end":{"row":67,"column":87},"action":"insert","lines":["a"],"id":135}],[{"start":{"row":67,"column":86},"end":{"row":67,"column":87},"action":"remove","lines":["a"],"id":136}],[{"start":{"row":67,"column":86},"end":{"row":67,"column":87},"action":"insert","lines":["t"],"id":137}],[{"start":{"row":67,"column":87},"end":{"row":67,"column":88},"action":"insert","lines":["a"],"id":138}],[{"start":{"row":19,"column":0},"end":{"row":20,"column":53},"action":"insert","lines":["<div class=\"row\">","    <div class=\"col-md-4\" style=\"text-align: center\">"],"id":139}],[{"start":{"row":21,"column":0},"end":{"row":22,"column":6},"action":"insert","lines":["    </div>","</div>"],"id":140}],[{"start":{"row":22,"column":6},"end":{"row":23,"column":0},"action":"insert","lines":["",""],"id":141}],[{"start":{"row":20,"column":53},"end":{"row":21,"column":8},"action":"insert","lines":["","        "],"id":142}],[{"start":{"row":21,"column":8},"end":{"row":22,"column":0},"action":"insert","lines":["",""],"id":143},{"start":{"row":22,"column":0},"end":{"row":22,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":22,"column":0},"end":{"row":28,"column":0},"action":"insert","lines":["<div class=\"panel panel-default\">","  <div class=\"panel-heading\">Panel heading</div>","  <div class=\"panel-body\">","    Panel content","  </div>","</div>",""],"id":144}],[{"start":{"row":23,"column":35},"end":{"row":23,"column":42},"action":"remove","lines":["heading"],"id":145}],[{"start":{"row":23,"column":34},"end":{"row":23,"column":35},"action":"remove","lines":[" "],"id":146}],[{"start":{"row":23,"column":33},"end":{"row":23,"column":34},"action":"remove","lines":["l"],"id":147}],[{"start":{"row":23,"column":32},"end":{"row":23,"column":33},"action":"remove","lines":["e"],"id":148}],[{"start":{"row":23,"column":31},"end":{"row":23,"column":32},"action":"remove","lines":["n"],"id":149}],[{"start":{"row":23,"column":30},"end":{"row":23,"column":31},"action":"remove","lines":["a"],"id":150}],[{"start":{"row":23,"column":29},"end":{"row":23,"column":30},"action":"remove","lines":["P"],"id":151}],[{"start":{"row":23,"column":29},"end":{"row":24,"column":0},"action":"insert","lines":["    <?php echo $this->Html->image($ticket->users[0]->foto_id, array('alt' => 'imagen cedula',  'height'=>'202', 'width'=>'320', 'class'=> 'img-responsive')); ?>",""],"id":152}],[{"start":{"row":26,"column":4},"end":{"row":26,"column":17},"action":"remove","lines":["Panel content"],"id":153},{"start":{"row":26,"column":4},"end":{"row":63,"column":28},"action":"insert","lines":["<table class=\"vertical-table\" style=\"border-spacing: 8px; border-collapse: separate\">","                        <tr><td>","                            <?php echo $this->Form->label($ticket->users[0]->nombre, 'Nombre:'); ?>","                            <?= h($ticket->users[0]->nombre) ?>","                        </td></tr>                         ","                        <tr><td>","                            <?php echo $this->Form->label($ticket->users[0]->cedula, 'Cédula:'); ?>","                            <?= h($ticket->users[0]->cedula) ?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->tipo_activo, 'Tipo Equipo:'); ?>","                            <?= h($ticket->tipo_activo) ?>","                        </td></tr>                        ","                        <tr><td>","                            <?php echo $this->Form->label($ticket->marca, 'Marca:'); ?>","                            <?= h($ticket->marca) ?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->modelo, 'Modelo:'); ?>","                            <?= h($ticket->modelo) ?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->serie, 'Número Serie:'); ?>","                            <?= h($ticket->serie) ?>","                        </td></tr>","                        <tr><td>","                            <?php if ($ticket->placa_universitaria !=null){?>","                                <?php echo $this->Form->label($ticket->placa_universitaria, 'Número de Placa:'); ?>","                                <?= h($ticket->placa_universitaria) ?>","                                <br />","                            <?php }?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->id, 'Número de Boleta:'); ?>","                            <?= h($ticket->id) ?>","                        </td></tr>","                        <br/>","                    </table>"]}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"remove","lines":["4"],"id":154}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"insert","lines":["6"],"id":155}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"remove","lines":["6"],"id":156}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"insert","lines":["5"],"id":157}],[{"start":{"row":20,"column":24},"end":{"row":20,"column":25},"action":"insert","lines":[" "],"id":158}],[{"start":{"row":20,"column":25},"end":{"row":20,"column":41},"action":"insert","lines":["col-md-offset-4\""],"id":159}],[{"start":{"row":20,"column":40},"end":{"row":20,"column":42},"action":"remove","lines":["\"\""],"id":160}],[{"start":{"row":20,"column":40},"end":{"row":20,"column":41},"action":"insert","lines":[":"],"id":161}],[{"start":{"row":20,"column":40},"end":{"row":20,"column":41},"action":"remove","lines":[":"],"id":162}],[{"start":{"row":20,"column":40},"end":{"row":20,"column":41},"action":"insert","lines":["¨"],"id":163}],[{"start":{"row":20,"column":40},"end":{"row":20,"column":41},"action":"remove","lines":["¨"],"id":164}],[{"start":{"row":20,"column":40},"end":{"row":20,"column":41},"action":"insert","lines":["\""],"id":165}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"remove","lines":["4"],"id":166}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"insert","lines":["3"],"id":167}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"remove","lines":["3"],"id":168}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"insert","lines":["4"],"id":169}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"remove","lines":["5"],"id":170}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"insert","lines":["4"],"id":171}],[{"start":{"row":69,"column":0},"end":{"row":126,"column":6},"action":"remove","lines":["","<br/>","<div class=\"row\">","    <div class=\"col-md-4\" style=\"text-align: center\">","        <br />","        <br />","        <br />","    <?php echo $this->Html->image($ticket->users[0]->foto_id, array('alt' => 'imagen cedula',  'height'=>'202', 'width'=>'320', 'class'=> 'img-responsive')); ?>","        <br/>","    </div>","    <div class=\"col-md-4 col-md-offset-2\">","        <div class=\"panel panel-default\">","            <div class=\"panel-body\">","                <div class=\"users form\">","                    <table class=\"vertical-table\" style=\"border-spacing: 8px; border-collapse: separate\">","                        <tr><td>","                            <?php echo $this->Form->label($ticket->users[0]->nombre, 'Nombre:'); ?>","                            <?= h($ticket->users[0]->nombre) ?>","                        </td></tr>                         ","                        <tr><td>","                            <?php echo $this->Form->label($ticket->users[0]->cedula, 'Cédula:'); ?>","                            <?= h($ticket->users[0]->cedula) ?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->tipo_activo, 'Tipo Equipo:'); ?>","                            <?= h($ticket->tipo_activo) ?>","                        </td></tr>                        ","                        <tr><td>","                            <?php echo $this->Form->label($ticket->marca, 'Marca:'); ?>","                            <?= h($ticket->marca) ?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->modelo, 'Modelo:'); ?>","                            <?= h($ticket->modelo) ?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->serie, 'Número Serie:'); ?>","                            <?= h($ticket->serie) ?>","                        </td></tr>","                        <tr><td>","                            <?php if ($ticket->placa_universitaria !=null){?>","                                <?php echo $this->Form->label($ticket->placa_universitaria, 'Número de Placa:'); ?>","                                <?= h($ticket->placa_universitaria) ?>","                                <br />","                            <?php }?>","                        </td></tr>","                        <tr><td>","                            <?php echo $this->Form->label($ticket->id, 'Número de Boleta:'); ?>","                            <?= h($ticket->id) ?>","                        </td></tr>","                        <br/>","                    </table>","                </div>","            </div>","        </div>","    </div>","","</div>"],"id":171}],[{"start":{"row":12,"column":32},"end":{"row":12,"column":33},"action":"insert","lines":["d"],"id":173}],[{"start":{"row":12,"column":33},"end":{"row":12,"column":34},"action":"insert","lines":["e"],"id":174}],[{"start":{"row":12,"column":34},"end":{"row":12,"column":35},"action":"insert","lines":[" "],"id":175}],[{"start":{"row":12,"column":35},"end":{"row":12,"column":36},"action":"insert","lines":["l"],"id":176}],[{"start":{"row":12,"column":36},"end":{"row":12,"column":37},"action":"insert","lines":["a"],"id":177}],[{"start":{"row":12,"column":37},"end":{"row":12,"column":38},"action":"insert","lines":[" "],"id":178}],[{"start":{"row":20,"column":42},"end":{"row":20,"column":68},"action":"remove","lines":["style=\"text-align: center\""],"id":179}],[{"start":{"row":20,"column":41},"end":{"row":20,"column":42},"action":"remove","lines":[" "],"id":180}],[{"start":{"row":21,"column":5},"end":{"row":21,"column":29},"action":"insert","lines":["<div class=\"intro-text\">"],"id":181}],[{"start":{"row":69,"column":0},"end":{"row":69,"column":6},"action":"insert","lines":["</div>"],"id":182}],[{"start":{"row":23,"column":33},"end":{"row":24,"column":0},"action":"insert","lines":["",""],"id":183},{"start":{"row":24,"column":0},"end":{"row":24,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":23,"column":33},"end":{"row":24,"column":0},"action":"insert","lines":["",""],"id":184},{"start":{"row":24,"column":0},"end":{"row":24,"column":2},"action":"insert","lines":["  "]}],[{"start":{"row":24,"column":2},"end":{"row":24,"column":37},"action":"insert","lines":["<div class=\"col-lg-12 text-center\">"],"id":185}],[{"start":{"row":24,"column":23},"end":{"row":24,"column":24},"action":"remove","lines":[" "],"id":186}],[{"start":{"row":24,"column":22},"end":{"row":24,"column":23},"action":"remove","lines":["2"],"id":187}],[{"start":{"row":24,"column":21},"end":{"row":24,"column":22},"action":"remove","lines":["1"],"id":188}],[{"start":{"row":24,"column":20},"end":{"row":24,"column":21},"action":"remove","lines":["-"],"id":189}],[{"start":{"row":24,"column":19},"end":{"row":24,"column":20},"action":"remove","lines":["g"],"id":190}],[{"start":{"row":24,"column":18},"end":{"row":24,"column":19},"action":"remove","lines":["l"],"id":191}],[{"start":{"row":24,"column":17},"end":{"row":24,"column":18},"action":"remove","lines":["-"],"id":192}],[{"start":{"row":24,"column":16},"end":{"row":24,"column":17},"action":"remove","lines":["l"],"id":193}],[{"start":{"row":24,"column":15},"end":{"row":24,"column":16},"action":"remove","lines":["o"],"id":194}],[{"start":{"row":24,"column":14},"end":{"row":24,"column":15},"action":"remove","lines":["c"],"id":195}],[{"start":{"row":26,"column":6},"end":{"row":27,"column":0},"action":"insert","lines":["",""],"id":196}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":6},"action":"insert","lines":["</div>"],"id":197}],[{"start":{"row":39,"column":86},"end":{"row":39,"column":87},"action":"insert","lines":["d"],"id":198}],[{"start":{"row":39,"column":87},"end":{"row":39,"column":88},"action":"insert","lines":["e"],"id":199}],[{"start":{"row":39,"column":88},"end":{"row":39,"column":89},"action":"insert","lines":[" "],"id":200}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"remove","lines":["4"],"id":201}],[{"start":{"row":20,"column":23},"end":{"row":20,"column":24},"action":"insert","lines":["6"],"id":202}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"remove","lines":["4"],"id":203}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"insert","lines":["2"],"id":204}],[{"start":{"row":24,"column":27},"end":{"row":25,"column":6},"action":"insert","lines":["","      "],"id":205}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"remove","lines":["2"],"id":213}],[{"start":{"row":20,"column":39},"end":{"row":20,"column":40},"action":"insert","lines":["3"],"id":214}],[{"start":{"row":27,"column":0},"end":{"row":28,"column":0},"action":"insert","lines":["",""],"id":215}],[{"start":{"row":24,"column":14},"end":{"row":24,"column":25},"action":"remove","lines":["text-center"],"id":216}],[{"start":{"row":24,"column":14},"end":{"row":24,"column":29},"action":"insert","lines":["col-md-offset-3"],"id":217}],[{"start":{"row":24,"column":28},"end":{"row":24,"column":29},"action":"remove","lines":["3"],"id":218}],[{"start":{"row":24,"column":28},"end":{"row":24,"column":29},"action":"insert","lines":["1"],"id":219}],[{"start":{"row":24,"column":28},"end":{"row":24,"column":29},"action":"remove","lines":["1"],"id":221}],[{"start":{"row":24,"column":28},"end":{"row":24,"column":29},"action":"insert","lines":["2"],"id":222}],[{"start":{"row":24,"column":28},"end":{"row":24,"column":29},"action":"remove","lines":["2"],"id":223}],[{"start":{"row":24,"column":28},"end":{"row":24,"column":29},"action":"insert","lines":["1"],"id":224}],[{"start":{"row":25,"column":4},"end":{"row":25,"column":42},"action":"insert","lines":["<?php if ($user->foto_id != null){?>  "],"id":225}],[{"start":{"row":27,"column":0},"end":{"row":27,"column":4},"action":"insert","lines":["    "],"id":226}],[{"start":{"row":27,"column":4},"end":{"row":27,"column":13},"action":"insert","lines":["<?php }?>"],"id":227}],[{"start":{"row":25,"column":14},"end":{"row":25,"column":28},"action":"remove","lines":["$user->foto_id"],"id":228},{"start":{"row":25,"column":14},"end":{"row":25,"column":41},"action":"insert","lines":["$ticket->users[0]->foto_id,"]}],[{"start":{"row":25,"column":40},"end":{"row":25,"column":41},"action":"remove","lines":[","],"id":235}]]},"ace":{"folds":[],"scrolltop":216.5,"scrollleft":0,"selection":{"start":{"row":25,"column":40},"end":{"row":25,"column":40},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":12,"state":"start","mode":"ace/mode/php"}},"timestamp":1468341205869,"hash":"ad1c0ec825da9247c5cd62dec72cbc2094729ff8"}