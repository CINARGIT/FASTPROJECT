<link rel="stylesheet" href="<?=get_template_directory_uri()?>/calc.css" type="text/css" media="all" />
<script type="text/javascript" src="<?=get_template_directory_uri()?>/calc.js"></script>
<div class="calc_wrap container" id="calc_wrap">
	<div class="calc_zag">Расчёт стоимости обследования</div>
	<form class="calc_form">
		<div class="step_wrap step-1 active">
			<div class="calc_subzag">Размеры здания</div>
			<div class="calc_subwrap">
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Длина, м</div>
					<input type="text" name="dlin" placeholder="Введите длину в метрах">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Ширина, м</div>
					<input type="text" name="shrin" placeholder="Введите ширину в метрах">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Высота, м</div>
					<input type="text" name="vyshin" placeholder="Введите высоту в метрах">
				</div>
			</div>
			<div class="calc_subzag">Параметры здания</div>
			<div class="calc_subwrap">
				<div class="calc_itemwrap frow">
					<div class="calc_itemzag">Этажность</div>
					<div class="pseudora" data-val="1">Одноэтажное</div>
					<div class="pseudora" data-val="2">Многоэтажное</div>
					<input type="hidden" name="etage" value="">
				</div>
				<div class="calc_itemwrap frow">
					<div class="calc_itemzag">Назначение</div>
					<div class="pseudora" data-val="1">Гражданское</div>
					<div class="pseudora" data-val="0.8">Промышленное</div>
					<input type="hidden" name="naznage" value="">
				</div>
				<div class="calc_itemwrap frow">
					<div class="calc_itemzag">Каркасность</div>
					<div class="pseudora" data-val="1">Каркасное</div>
					<div class="pseudora" data-val="2">Бескаркасное</div>
					<input type="hidden" name="carcage" value="">
				</div>
				<div class="calc_itemwrap frow">
					<div class="calc_itemzag ques">Категория сложности здания</div>
					<div class="pseudora" data-val="1">Первая</div>
					<div class="pseudora" data-val="2">Вторая</div>
					<div class="pseudora" data-val="3">Третья</div>
					<input type="hidden" name="caslozhda" value="">
				</div>
				<div class="calc_itemwrap frow">&nbsp;</div>
				<div class="calc_itemwrap frow">
					<div class="calc_itemzag ques">Категория сложности работ</div>
					<div class="pseudora" data-val="1">Первая</div>
					<div class="pseudora" data-val="2">Вторая</div>
					<div class="pseudora" data-val="3">Третья</div>
					<input type="hidden" name="caslozhra" value="">
				</div>
			</div>
			<div class="calc_subwrap forques">
				<h3>Категории сложности зданий</h3>
				<table>
					<tbody>
						<tr>
							<th>Категории сложности зданий:</th>
							<th>Одноэтажные здания</th>
							<th>Многоэтажные здания</th>
						</tr>
						<tr>
							<th>1</th>
							<td>Одно и двухпролетные бескаркасные, бескрановые, высотой до 5 м</td>
							<td>Здания прямоугольной формы в плане, с однотипными (одинаковая площадь, назначение и т.п.) помещениями в пределах этажа</td>
						</tr>
						<tr>
							<th>2</th>
							<td>Здания больше 2 пролетов, или высотой более 5 м, или с большим количеством разнотипных помещений в пределах этажа</td>
							<td>Здания, состоящие из 2-3 прямоугольников в плане, или с разнотипными помещениями в пределах этажа</td>
						</tr>
						<tr>
							<th>3</th>
							<td>Здания, состоящие из более 3 прямоугольников в плане или с криволинейными очертаниями, с разнотипными помещениями в пределах этажа, или с двухярусным расположением мостовых конструкций</td>
							<td>Здания, состоящие из более 3 прямоугольников в плане или с криволинейными очертаниями, с разнотипными помещениями в пределах этажа</td>
						</tr>
					</tbody>
				</table>
				<h3>Категории сложности работ по обследованию</h3>
				<table>
					<tbody>
						<tr>
							<th>Категория сложности работ</th>
							<th>Состояние строительных конструкций</th>
							<th>Состав работ</th>
						</tr>
						<tr>
							<th>1</th>
							<td>Независимо от состояния</td>
							<td>
								<ol>
									<li>Визуальное обследование и определение категории технического состояния</li>
									<li>Составление дефектных ведомостей</li>
									<li>Составление описей ремонтно-восстановительных работ</li>
									<li>Составление Заключения</li>
								</ol>
							</td>
						</tr>
						<tr>
							<th>2</th>
							<td>Нормативное и работоспособное</td>
							<td>
								<ol>
									<li>Изучение проектной и исполнительной документации</li>
									<li>Составление программы работ</li>
									<li>Детальный осмотр с составлением схемы расположения дефектов</li>
									<li>Составление дефектных ведомостей с замерами дефектов и повреждений</li>
									<li>Фотофиксация наиболее характерных дефектов и повреждений</li>
									<li>Указание Заказчику мест вскрытия конструкций и проходки шурфов для отбора проб</li>
									<li>Отбор проб, инструментальные и лабораторные исследования</li>
									<li>Выполнение поверочных расчетов</li>
									<li>Составление Заключения с выводами и рекомендациями по дальнейшей безопасной эксплуатации</li>
								</ol>
							</td>
						</tr>
						<tr>
							<th>3</th>
							<td>Ограниченно работоспособное и аварийное</td>
							<td>
								<ol>
									<li>Изучение проектной и исполнительной документации</li>
									<li>Составление программы работ</li>
									<li>Детальный осмотр с составлением схемы расположения дефектов</li>
									<li>Составление дефектных ведомостей с замерами дефектов и повреждений</li>
									<li>Фотофиксация наиболее характерных дефектов и повреждений</li>
									<li>Указание Заказчику мест вскрытия конструкций и проходки шурфов для отбора проб</li>
									<li>Отбор проб, инструментальные и лабораторные исследования</li>
									<li>Выполнение поверочных расчетов</li>
									<li>Разработка временных противоаварийных мероприятий</li>
									<li>Составление Заключения с выводами и рекомендациями по дальнейшей безопасной эксплуатации</li>
								</ol>
							</td>
						</tr>
					</tbody>
				</table>
				<h3>Категории сложности работ по обмерам</h3>
				<table>
					<tbody>
						<tr>
							<th>Категория сложности работ</th>
							<th>Состав работ</th>
						</tr>
						<tr>
							<th>1</th>
							<td>Обмеры, необходимые для выполнения визуального обследования, составления схем дефектов и повреждений, мест вскрытия конструкций, отбора проб</td>
						</tr>
						<tr>
							<th>2</th>
							<td>Обмеры для составления рабочих чертежей по зданиям с однотипными конструкциями</td>
						</tr>
						<tr>
							<th>3</th>
							<td>Обмеры для составления рабочих чертежей по зданиям с разнотипными конструкциями</td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
		<div class="step_wrap step-2">
			<div class="calc_subzag">Виды работ</div>
			<div class="calc_subwrap">
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Обследование</div>
					<div class="pseudoche txt" data-val="fund">Фундаменты</div>
					<div class="pseudoche txt" data-val="sten">Стены</div>
					<div class="pseudoche txt" data-val="poly">Полы</div>
					<div class="pseudoche txt" data-val="kostki">Колонны, столбы, стойки </div>
					<div class="pseudoche txt" data-val="lest">Лестницы</div>
					<div class="pseudoche txt" data-val="torm">Подкрановые и тормозные конструкции</div>
					<div class="pseudoche txt" data-val="perek">Перекрытия</div>
					<div class="pseudoche txt" data-val="nesu">Несущие конструкции покрытия</div>
					<div class="pseudoche txt" data-val="ogra">Ограждающие конструкции покрытия</div>
					<div class="pseudoche txt" data-val="sovme">Совмещённые покрытия или крыши</div>
					<div class="pseudoche txt" data-val="krov">Кровля</div>
					<input type="hidden" name="vobsle" value="">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Обмерные работы</div>
					<div class="pseudoche txt" data-val="ofunda">Планы фундаментов, фундаменты и фундаментные балки</div>
					<div class="pseudoche txt" data-val="ofund">Планы фундаментов и фундаменты</div>
					<div class="pseudoche txt" data-val="opoet">Поэтажные планы здания</div>
					<div class="pseudoche txt" data-val="okol">Планы колонн и связей, подкрановых и тормозных конструкций с узлами сопряжений</div>
					<div class="pseudoche txt" data-val="opol">Планы полов с определением состава полов</div>
					<div class="pseudoche txt" data-val="opraz">Поперечные и продольные разрезы с узлами сопряжений конструкций</div>
					<div class="pseudoche txt" data-val="ofafe">Фасады, окна, ворота</div>
					<div class="pseudoche txt" data-val="okolst">Конструкции колонн и стоек</div>
					<div class="pseudoche txt" data-val="olest">Лестницы</div>
					<div class="pseudoche txt" data-val="otorm">Подкрановые и тормозные конструкции</div>
					<div class="pseudoche txt" data-val="operek">Планы конструкций перекрытий со вскрытиями</div>
					<div class="pseudoche txt" data-val="opodk">Подкрановые конструкции</div>
					<div class="pseudoche txt" data-val="onesu">Планы несущих конструкций покрытия со связями и прогонами, узлами сопряжений конструкций</div>
					<div class="pseudoche txt" data-val="oogr">Планы ограждающих конструкций покрытия со вскрытиями</div>
					<div class="pseudoche txt" data-val="ostrop">Стропильные и подстропильные конструкции покрытия с определением сечений</div>
					<div class="pseudoche txt" data-val="okrys">Крыши</div>
					<div class="pseudoche txt" data-val="okrov">Планы кровли со вскрытиями</div>
					<input type="hidden" name="vobmer" value="">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Обследование инженерных систем</div>
					<div class="pseudoche txt" data-val="gorvo">Горячеее водоснабжение</div>
					<div class="pseudoche txt" data-val="otop">Отопление</div>
					<div class="pseudoche txt" data-val="holvo">Холодное водоснабжение и канализация</div>
					<div class="pseudoche txt" data-val="venti">Вентиляция</div>
					<div class="pseudoche txt" data-val="musou">Мусороудаление</div>
					<div class="pseudoche txt" data-val="gaszn">Газоснабжение</div>
					<div class="pseudoche txt" data-val="vosto">Водостоки</div>
					<div class="pseudoche txt" data-val="elses">Электросети и средства связи</div>
					<input type="hidden" name="vinzh" value="">
				</div>
			</div>
		</div>
		<div class="step_wrap step-3">
			<div class="calc_subzag">Дополнительные параметры</div>
			<div class="calc_subwrap">
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Усложняющие факторы</div>
					<div class="pseudoche txt" data-val="prosad">Здания, возведённые на просадочных грунтах и т.д.</div>
					<div class="pseudoche txt" data-val="dejpro">Действующее производство, затруднённые условия</div>
					<div class="pseudoche txt" data-val="www">Вредное производство, вибровоздействия, выделения пара</div>
					<div class="pseudoche txt" data-val="zim">Выполнение работ в зимний период года</div>
					<div class="pseudoche txt" data-val="pamarch">Выполнение работ в зданиях, являющихся памятником архитектуры</div>
					<div class="pseudoche txt" data-val="vysrab">Работа на высоте, с использованием лестниц и различных приспособлений</div>
					<div class="pseudoche txt" data-val="slagr">Выполнение работ в цехах со слабой степенью агрессивного воздействия</div>
					<div class="pseudoche txt" data-val="sregr">Выполнение работ в цехах со средней степенью агрессивного воздействия</div>
					<div class="pseudoche txt" data-val="silagr">Выполнение работ в цехах с сильной степенью агрессивного воздействия</div>
					<div class="pseudoche txt" data-val="usicon">Конструкции, усиленные по ранее разработанным проектам</div>
					<div class="pseudoche txt" data-val="seis7">Сейсмичность 7 баллов</div>
					<div class="pseudoche txt" data-val="seis8">Сейсмичность 8 баллов</div>
					<div class="pseudoche txt" data-val="specre">Объекты со спецрежимом</div>
					<input type="hidden" name="uslofac" value="">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Прочее</div>
					<div class="pseudoche" data-val="1.25">Шаг конструкций менее 6 метров</div>
					<div class="pseudoche" data-val="1.1">Смета на ремонтно-восстановительные работы</div>
					<input type="hidden" name="profac" value="1">
				</div>
				<div class="calc_itemwrap">
					<div class="pseudoche jekyll">Требуется автоподъёмник</div>
					<input type="text" name="avtopod" placeholder="Укажите количество дней">
				</div>
				<div class="calc_itemwrap">
					<div class="pseudoche jekyll">Требуется откопка шурфов</div>
					<input type="text" name="otschur" placeholder="Укажите количество шурфов">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Транспортные расходы</div>
					<select name="transhod" autocomplete="off">
						<option value="0">В пределах МКАД</option>
						<option value="1">До 10 км от МКАД</option>
						<option value="2">10-20 км от МКАД</option>
						<option value="3">20-30 км от МКАД</option>
						<option value="4">30-40 км от МКАД</option>
						<option value="5">40-50 км от МКАД</option>
						<option value="6">50-60 км от МКАД</option>
						<option value="7">60-70 км от МКАД</option>
						<option value="8">70-80 км от МКАД</option>
						<option value="9">80-90 км от МКАД</option>
						<option value="10">От 90 км от МКАД</option>
					</select>
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Коэффициент инфляции</div>
					<span>На I квартал 2023 года согласно Письму Минстроя России № 39010-ИФ/09 от 05.08.2022</span>
					<input type="text" name="infla_" placeholder="5.12" disabled>
					<input type="hidden" name="infla" value="5.12" class="infla">
				</div>
			</div>
		</div>
		<div class="step_wrap step-4">
			<div class="calc_subwrap">
				<div class="calc_ott">Ориентировочная стоимость составит <span>0</span> рублей</div>
				<input type="hidden" name="summ">
			</div>
			<div class="calc_subzag">Расчетом не учтена стоимость следующих работ</div>
			<div class="calc_subwrap">
				<div class="calc_itemwrap">
					<ul>
						<li>Вскрытие в конструкциях и их заделка</li>
						<li>Отбивки и восстановления штукатурки для определения прочности кладки стен</li>
						<li>Устройство, перемещения и разборка лесов, подмостей и настила</li>
						<li>Устройство на объекте временного стационарного освещения</li>
					</ul>
				</div>
				<div class="calc_itemwrap">
					<ul>
						<li>Откачка воды при обследовании затопленных помещений</li>
						<li>Постановка длительных наблюдений за состоянием конструкций</li>
						<li>Планово-высотная съемка положения строительных конструкций</li>
					</ul>
				</div>
				<div class="calc_itemwrap">
					<ul>
						<li>Обследование оснований фундаментов, отбор образцов грунтов и материалов конструкций, их транспортировка, лабораторные испытания и составление Протоколов</li>
						<li>Затраты на служебные командировки</li>
					</ul>
				</div>
			</div>
			<div class="calc_subzag forhide">Ваши контактные данные</div>
			<div class="calc_subwrap forhide">
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Ваше имя</div>
					<input type="text" name="fio" placeholder="Введите имя">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Телефон *</div>
					<input type="text" name="phone" placeholder="Введите телефон">
				</div>
				<div class="calc_itemwrap">
					<div class="calc_itemzag">Почта</div>
					<input type="text" name="email" placeholder="Введите почту">
				</div>
			</div>
			<div class="calc_subzag invisi">Ваше сообщение отправлено</div>
		</div>
		<div class="calc_resul">
			<div class="calc_prev" data-next="1">Назад</div>
			<div class="calc_next" data-next="2">Вперёд</div>
		</div>
	</form>
</div>