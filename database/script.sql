SET foreign_key_checks = 0;
drop table users;
drop table movies;
drop table theaters;
drop table halls;
drop table seances;
drop table bookings;
drop table user_history;
drop table events;
drop table admins;
SET foreign_key_checks = 1;

create table users (id int(10) NOT NULL auto_increment, login VARCHAR(255) not null, password varchar(255) not null, 
	created_at TIMESTAMP NOT NULL, contact_number bigint NOT NULL, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table admins (id int(10) NOT NULL auto_increment, login VARCHAR(255) not null, password varchar(255) not null, 
	created_at TIMESTAMP NOT NULL, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table user_history (id int(10) NOT NULL auto_increment, user_id int not null, event varchar(255) not null, 
	happened_at TIMESTAMP NOT NULL, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table events (id int(10) NOT NULL auto_increment, type varchar(255) not null, 
	happened_at TIMESTAMP NOT NULL, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table movies (id int(10) NOT NULL auto_increment, categories varchar(255) not null, age int not null, title VARCHAR(255) not null, 
	release_date date NOT NULL, synopsis text not null, cast varchar(255) not null, poster varchar(255) not null, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table theaters (id int(10) NOT NULL auto_increment, name varchar(255) not null, 
	address varchar(255) not null, contact_number varchar(255) not null, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table halls (id int(10) NOT NULL auto_increment, theater_id int not null, number int not null, capacity int not null, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table seances (id int(10) NOT NULL auto_increment, movie_id int not null, hall_id int not null,
	showtime datetime not null, charge int not null, free_space int,  primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;


create table bookings (id int(10) NOT NULL auto_increment, user_id int not null, seance_id int not null,
	buytime TIMESTAMP not null, quantity int not null, primary key(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

alter table seances add constraint foreign key (movie_id) references movies(id) on delete cascade;
alter table seances add constraint foreign key (hall_id) references halls(id) on delete cascade;
alter table halls add constraint foreign key (theater_id) references theaters(id) on delete cascade;
alter table bookings add constraint foreign key (user_id) references users(id) on delete cascade;
alter table bookings add constraint foreign key (seance_id) references seances(id) on delete cascade;


insert into movies(categories, age, title, release_date, synopsis, cast, poster) values('ужасы, триллер', 18, 'Ведьма из Блэр', '1999-01-25',
	'В октябре 1994 года трое студентов-кинематографистов исчезли в лесах штата Мэриленд во время съемок документального фильма. Год спустя снятый ими материал был найден.

Они приехали в лес на Чёрных холмах, чтобы снять документальный фильм о местной легенде — Ведьме из Блэр, мучившей и убивавшей всех, кто забредал в её владения. В предании говорится о вековом проклятии, ритуальных убийствах детей, зловещих артефактах и сверхъестественных явлениях. Но не успели студенты, вооруженные 16-миллиметровой камерой, углубиться в лес, как безнадежно заблудились. Вокруг них сгущается невидимое зло.',
	'Хезер Донахью, Джошуа Леонард, Майкл С. Уильямс, Боб Гриффин, Джим Кинг, Сандра Санчес','assets/images/poster.jpg');


insert into movies(categories, age, title, release_date, synopsis, cast, poster) values('драма, триллер', 16, 'Джокер', '2019-08-31',
	'Готэм, начало 1980-х годов. Комик Артур Флек живет с больной матерью, которая с детства учит его «ходить с улыбкой». Пытаясь нести в мир хорошее и дарить людям радость, Артур сталкивается с человеческой жестокостью и постепенно приходит к выводу, что этот мир получит от него не добрую улыбку, а ухмылку злодея Джокера.',
	'Хоакин Феникс, Роберт Де Ниро, Зази Битц, Фрэнсис Конрой','assets/images/poster1.jpg');


insert into movies(categories, age, title, release_date, synopsis, cast, poster) values('фантастика, боевик', 11, 'Алита: Боевой ангел', '2019-02-14',
	'Действие фильма происходит через 300 лет после Великой войны в XXVI веке. Доктор Идо находит останки женщины-киборга. После починки киборг ничего не помнит, но обнаруживает, что в состоянии пользоваться боевыми приемами киборгов. Начинаются поиски утерянных воспоминаний.',
	'Роза Салазар, Кристоф Вальц, Дженнифер Коннелли, Махершала Али, Эд Скрейн','assets/images/poster2.jpg');



insert into movies(categories, age, title, release_date, synopsis, cast, poster) values('фантастика, боевик', 12, 'Капитан Марвел', '2019-02-27',
	'После столкновения с враждующими инопланетными расами, пилот военно-воздушных сил Кэрол Дэнверс обретает суперсилу и становится неуязвимой. Героине предстоит совладать со своими новыми способностями, чтобы противостоять могущественному врагу.',
	'Бри Ларсон, Сэмюэл Л. Джексон, Бен Мендельсон, Джуд Лоу','assets/images/poster3.jpg');


insert into movies(categories, age, title, release_date, synopsis, cast, poster) values('комедия, биография', 14, 'Зелёная книга', '2018-09-21',
	'Утонченный светский лев, богатый и талантливый музыкант нанимает в качестве водителя и телохранителя человека, который менее всего подходит для этой работы. Тони по прозвищу Болтун — вышибала, не умеющий держать рот на замке и пользоваться столовыми приборами, зато он хорошо работает кулаками. Это турне навсегда изменит жизнь обоих.',
	'Вигго Мортенсен, Махершала Али, Линда Карделлини, Себастьян Манискалко','assets/images/poster4.jpg');

insert into movies(categories, age, title, release_date, synopsis, cast, poster) values('драма, психологический', 11, 'Завод', '2018-01-24',
	'Прямо посреди дня из своего «мерса» похищен местный олигарх Калугин. Неизвестные в балаклавах потребовали за него большой выкуп. Отвезти деньги берётся глава личной охраны бизнесмена по кличке Туман. Его вооружённые до зубов «спецы» приезжают ночью на завод Калугина, где теперь босса держат в заложниках.

Они пока не знают, что те другие, забаррикадировавшиеся в цехе — это местные рабочие во главе с бывшим спецназовцем по прозвищу Седой. Полгода без зарплаты и предстоящее банкротство завода толкнули их на отчаянный шаг.

Чтобы вытащить своего хозяина, «спецы» не остановятся ни перед чем. Но в отличие от них «работягам» больше нечего терять…',
	'Денис Шведов, Андрей Смоляков, Владислав Абашин','assets/images/poster5.jpg');

insert into movies(categories, age, title, release_date, synopsis, cast, poster) values('драма', 12, 'Айка', '2018-08-18',
	'Молодая девушка, приехавшая в холодную Москву на заработки, вынуждена оставить своего новорожденного ребенка в роддоме. Однако вскоре ей предстоит понять, способна ли она смириться с разлукой…',
	'Самал Еслямова, Джипаргуль Абдилова, Давид Алавердян, Нуржамал Мамадалиева','assets/images/poster6.jpg');


insert into theaters(name, address, contact_number) values('Звезда', 'ул. Шмидта д.4',86786938422);
insert into theaters(name, address, contact_number) values('Ракета', 'ул. Еланского д.85',86759322477);
insert into theaters(name, address, contact_number) values('Заря', 'ул. Остоженко д.17',86775392754);


insert into halls(theater_id, number, capacity) values(1, 1, 200);
insert into halls(theater_id, number, capacity) values(1, 2, 250);
insert into halls(theater_id, number, capacity) values(1, 3, 200);

insert into halls(theater_id, number, capacity) values(2, 1, 200);
insert into halls(theater_id, number, capacity) values(2, 2, 400);

insert into halls(theater_id, number, capacity) values(3, 1, 200);
insert into halls(theater_id, number, capacity) values(3, 2, 250);
insert into halls(theater_id, number, capacity) values(3, 3, 200);

insert into events(type) values('purchase');
insert into events(type) values('login');

insert into seances(movie_id, hall_id, showtime, charge)
	values(1, 2, '2019-11-08 12:30:00',200);
insert into seances(movie_id, hall_id, showtime, charge)
	values(1, 2, '2019-11-08 12:45:00',200);

insert into seances(movie_id, hall_id, showtime, charge)
	values(1, 4, '2019-11-08 12:45:00',200);
insert into seances(movie_id, hall_id, showtime, charge)
	values(1, 4, '2019-11-09 12:50:00',200);

insert into seances(movie_id, hall_id, showtime, charge)
	values(2, 2, '2019-11-08 12:00:00',200);

insert into seances(movie_id, hall_id, showtime, charge)
	values(3, 3, '2019-11-09 12:35:00',150);

insert into seances(movie_id, hall_id, showtime, charge)
	values(4, 4, '2019-11-08 13:30:00',200);

insert into seances(movie_id, hall_id, showtime, charge)
	values(5, 5, '2019-11-10 12:40:00',200);


insert into seances(movie_id, hall_id, showtime, charge)
	values(2, 4, '2019-11-12 14:00:17',200);

insert into seances(movie_id, hall_id, showtime, charge)
	values(2, 2, '2019-11-11 13:30:18',200);

insert into seances(movie_id, hall_id, showtime, charge)
	values(3, 3, '2019-11-08 16:30:00',150);

insert into seances(movie_id, hall_id, showtime, charge)
	values(4, 4, '2019-11-06 18:30:00',200);

insert into seances(movie_id, hall_id, showtime, charge)
	values(5, 5, '2019-11-08 19:30:00',200);

insert into admins(login, password) values('admin','098f6bcd4621d373cade4e832627b4f6');

update seances join halls on seances.hall_id=halls.id set seances.free_space=halls.capacity; 