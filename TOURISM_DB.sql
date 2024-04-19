create database TourismManagementCompany;
use TourismManagementCompany;

 create table GuideDetails(GuideId varchar(20) Primary key,GuideName varchar(50));
 insert into GuideDetails values ("G101", "Rahul Kumar");
 insert into GuideDetails values ("G102", "Harshal Sen");
 insert into GuideDetails values ("G103", "Kishan" );
 insert into GuideDetails values ("G104", "Ram Khanna");
 
create table BookingPackage(BookingId VARCHAR(20) PRIMARY KEY ,StartDt DATE,EndDt DATE,TypeOfTrip ENUM("Business","Family","Religious"),Location VARCHAR(50),Price DOUBLE(10,2));
ALTER TABLE BookingPackage
ADD COLUMN Description TEXT,
ADD COLUMN Includes VARCHAR(255),
ADD COLUMN Sites VARCHAR(255);
INSERT INTO BookingPackage VALUES ("B101","2024-05-05","2024-05-08",1,"Bangalore",12000.00,"Unlock Bangalore's business potential with our online tourism site. Book top hotels, conference spaces, and explore tech hubs. Elevate your corporate trip experience in India's tech capital."
,"Accommodation,Transport,Meal,Sightseeing","IT Parks and Tech Hubs");
INSERT INTO BookingPackage VALUES ("B102","2024-04-06","2024-04-11",1,"New York City",100000.00,"Explore our tailored business trip packages for New York City on our online tourism site. Maximize your productivity with seamless booking, curated accommodations, and access to premier meeting venues in the heart of the bustling financial district.",
"Accommodation,Transport,Meal","The New York Times Center,The Metropolitan Pavilion");
INSERT INTO BookingPackage VALUES ("B103","2024-06-06","2024-06-10",1,"Tokyo",85000.00,"Embark on a business journey to Tokyo with our specialized packages. Experience seamless bookings for accommodations and transportation. Dive into the vibrant business culture of Japan's capital.",
"Accommodation,Transport,Meal","Tokyo Big Sight, Tokyo International Forum");
INSERT INTO BookingPackage VALUES ("B104","2024-10-20","2024-10-25",2,"Goa",18000.00,"Enjoy a fun-filled family vacation in Goa's vibrant coastal paradise. Our packages offer beachfront accommodations, water sports, and cultural experiences for an unforgettable trip.",
"Accommodation,Transport,Meal,Sightseeing","Calangute Beach, Dudhsagar Falls, Basilica of Bom Jesus");
INSERT INTO BookingPackage VALUES ("B105","2024-11-15","2024-11-22",2,"Jaipur",22000.00,"Discover the royal heritage of Jaipur with your family. Our packages include stays in heritage hotels, guided tours of forts and palaces, and authentic Rajasthani cuisine.",
"Accommodation,Transport,Meal,Sightseeing","Amber Fort, City Palace Jaipur, Hawa Mahal");
INSERT INTO BookingPackage VALUES ("B106","2024-07-15","2024-07-20",2,"Paris",60000.00,"Create unforgettable family memories in the romantic city of Paris. Our packages offer a blend of cultural experiences and family-friendly attractions, ensuring a delightful trip for all.",
"Accommodation,Transport,Meal,Sightseeing","Eiffel Tower, Disneyland Paris");

INSERT INTO BookingPackage VALUES ("B107","2024-06-10","2024-06-15",3,"Varanasi",15000.00,"Embark on a spiritual journey to Varanasi, the holy city on the banks of the Ganges. Our packages include stays in sacred guesthouses, guided tours of temples, and serene boat rides along the river.",
"Accommodation,Transport,Meal,Sightseeing","Kashi Vishwanath Temple, Dashashwamedh Ghat, Sarnath");

INSERT INTO BookingPackage VALUES ("B108","2024-07-20","2024-07-25",3,"Haridwar",20000.00,"Experience the divine aura of Haridwar, one of the seven holiest places in Hinduism. Our packages offer comfortable accommodations, spiritual ceremonies on the ghats, and visits to ancient temples.",
"Accommodation,Transport,Meal,Sightseeing","Har Ki Pauri, Mansa Devi Temple, Chandi Devi Temple");

INSERT INTO BookingPackage VALUES ("B109","2024-08-15","2024-08-20",3,"Tirupati",18000.00,"Seek blessings at Tirupati, home to the renowned Venkateswara Temple. Our packages provide convenient stays, VIP darshan arrangements, and exploration of nearby religious sites.",
"Accommodation,Transport,Meal,Sightseeing","Tirumala Temple, Sri Govindaraja Swamy Temple, Talakona Waterfalls");


create table CustomerDetails(
     Cid  int primary key auto_increment,
     Cname varchar(150) not null,
     Cphno varchar(10)  UNIQUE,
     Ccity varchar(50) not null,
     Ctype enum('Regular','Special') not null,
     Cdob date);
     
insert into CustomerDetails values(22101,'Radha Joshi','9876556105','Pune',1,'2000/11/12');
insert into CustomerDetails values('22102','Pratik Pawar','9890543565','Mumbai',2,'1990/7/14');
insert into CustomerDetails values('22103','Gargi Sant','7622093577','Nagpur',1,'1997/8/27');
insert into CustomerDetails values('22104','Rohit Kulkarni','7620955357','Delhi',1,'1967/12/07');
insert into CustomerDetails values('22105','Mohit Pant','7609875357','Delhi',1,'1989/2/09');
insert into CustomerDetails values('22106','Reena Tondon','7683556390','Delhi',1,'1989/2/09');
insert into CustomerDetails values('22107','Yashita Maheshwari','7680955390','Delhi',1,'1989/2/09');
insert into CustomerDetails values('22108','Tiya Patil','7683558990','Delhi',1,'1989/2/09');

 

create table Hotel(Hid varchar(10) primary key, Hname varchar(50) not null, Hphno varchar(10) unique, Hrent int default 1000, Hcity varchar(50) not null, Hrating enum('*','**','***','****','*****') not null);

INSERT INTO Hotel VALUES ('H101', 'ITC Gardenia', '9876543210', 12000, 'Bangalore', '*****');
INSERT INTO Hotel VALUES ('H102', 'Hotel Orchid', '9876549010', 4000, 'Bangalore', '*****');
INSERT INTO Hotel VALUES ('H103', 'The Ritz-Carlton New York, Battery Park', '9876543211', 15000, 'New York City', '*****');
INSERT INTO Hotel VALUES ('H104', 'The Peninsula Tokyo', '9876543212', 17000, 'Tokyo', '*****');
INSERT INTO Hotel VALUES ('H105', 'Taj Exotica Resort & Spa, Goa', '9876543213', 8000, 'Goa', '*****');
INSERT INTO Hotel VALUES ('H106', 'Beach Hotel','9876509213', 2000, 'Goa', '***');
INSERT INTO Hotel VALUES ('H107', 'The Oberoi Rajvilas', '9876543214', 5500, 'Jaipur', '*****');
INSERT INTO Hotel VALUES ('H108', 'Four Seasons Hotel George V, Paris', '9876543215', 30000, 'Paris', '*****');
INSERT INTO Hotel VALUES ('H109', 'Hotel Temple View', '9876543216', 8000, 'Varanasi', '*****');
INSERT INTO Hotel VALUES ('H110', 'Worship Hotel', '9870943216', 2000, 'Varanasi', '****');
INSERT INTO Hotel VALUES ('H111', 'Radisson Blu Hotel Haridwar', '9876543217', 10000, 'Haridwar', '***');
INSERT INTO Hotel VALUES ('H112', 'Marasa Sarovar Premiere', '9876543218', 12000, 'Tirupati', '****');
 
 
 create table Transport(Tid varchar(10) primary key, Tmode enum('Bus or Car','Railway','Aeroplane') not null, Tprice int not null);
insert into Transport values("T101",1,200); insert into Transport values("T102",2,1000);
insert into Transport values("T103",3,3570);
 insert into Transport values("T104",3,4690);
 insert into Transport values("T105",1,500);
 INSERT INTO Transport VALUES ('T106', '1', 300);
INSERT INTO Transport VALUES ('T107', '2', 750);
INSERT INTO Transport VALUES ('T108', '3', 5000);
INSERT INTO Transport VALUES ('T109', '2', 1200);


create table SchTransport(Bid varchar(20) ,Tid varchar(50) , primary key (Bid,Tid),foreign key (Bid) references BookingPackage(BookingId)ON DELETE CASCADE
,foreign key (Tid)references Transport(Tid) ON DELETE CASCADE
, Date date not null, Time time not null ,StartCity varchar(50),EndCity varchar(50));
INSERT INTO SchTransport VALUES ('B101', 'T101', '2024-05-05', '08:00:00', 'Mumbai', 'Bangalore');
INSERT INTO SchTransport VALUES ('B101', 'T105', '2024-05-05', '10:00:00', 'Delhi', 'Bangalore');
INSERT INTO SchTransport VALUES ('B102', 'T104', '2024-04-06', '08:00:00', 'Delhi', 'New York City');
INSERT INTO SchTransport VALUES ('B103', 'T103', '2024-06-06', '07:00:00', 'Mumbai', 'Tokyo');
INSERT INTO SchTransport VALUES ('B104', 'T106', '2024-10-20', '10:00:00', 'Pune', 'Goa');
INSERT INTO SchTransport VALUES ('B104', 'T107', '2024-10-20', '13:00:00', 'Mumbai', 'Goa');
INSERT INTO SchTransport VALUES ('B105', 'T109', '2024-11-15', '09:00:00', 'Delhi', 'Jaipur');
INSERT INTO SchTransport VALUES ('B106', 'T108', '2024-07-15', '08:00:00', 'Chennai', 'Paris');
INSERT INTO SchTransport VALUES ('B107', 'T102', '2024-06-10', '06:00:00', 'Delhi', 'Varanasi');
INSERT INTO SchTransport VALUES ('B108', 'T105', '2024-07-20', '08:00:00', 'Delhi', 'Haridwar');
INSERT INTO SchTransport VALUES ('B109', 'T102', '2024-08-15', '06:00:00', 'Bangalore', 'Tirupati');


create table SchHotel(Bid varchar(20) ,Hid varchar(50) , primary key (Bid,Hid),foreign key (Bid) references BookingPackage(BookingId) ON DELETE CASCADE ,foreign key (Hid)
 references hotel(Hid) ON DELETE CASCADE, Check_In date not null ,Check_Out date not null);

INSERT INTO SchHotel VALUES ('B101', 'H101', '2024-05-05', '2024-05-07');
INSERT INTO SchHotel VALUES ('B101', 'H102', '2024-05-07', '2024-05-08');
INSERT INTO SchHotel VALUES ('B102', 'H103', '2024-04-06', '2024-04-11');
INSERT INTO SchHotel VALUES ('B103', 'H104', '2024-06-06', '2024-06-10');
INSERT INTO SchHotel VALUES ('B104', 'H105', '2024-10-20', '2024-10-23');
INSERT INTO SchHotel VALUES ('B104', 'H106', '2024-10-23', '2024-10-25');
INSERT INTO SchHotel VALUES ('B105', 'H107', '2024-11-15', '2024-11-22');
INSERT INTO SchHotel VALUES ('B106', 'H108', '2024-07-15', '2024-07-20');
INSERT INTO SchHotel VALUES ('B107', 'H109', '2024-06-10', '2024-06-12');
INSERT INTO SchHotel VALUES ('B107', 'H110', '2024-06-12', '2024-06-15');
INSERT INTO SchHotel VALUES ('B108', 'H111', '2024-07-20', '2024-07-25');
INSERT INTO SchHotel VALUES ('B109', 'H112', '2024-08-15', '2024-08-20');


create table Books( BId varchar(20) ,Cid int , primary key (BId,Cid),
foreign key (BId) references BookingPackage(BookingId) ON delete cascade,foreign key (Cid) references CustomerDetails(Cid) ON delete cascade, no_of_tourists int,total_amt double(10,2));

insert into Books values ("B101", "22101", 10, 15000.00);
insert into Books values ("B102", "22102", 2, 10000.00);
insert into Books values ("B104", "22104", 4, 13000.00);
insert into Books values ("B102", "22103", 9, 8000.00);
insert into Books values ("B105", "22104", 9, 20000.00);
insert into Books values ("B106", "22105", 10, 6000.00);
insert into Books values ("B107", "22106", 5, 26000.00);
insert into Books values ("B108", "22107", 7, 19000.00);
insert into Books values ("B109", "22101", 3, 28000.00);
insert into Books values ("B102", "22107", 4, 90000.00);
insert into Books values ("B101", "22108", 8, 23000.00);


create table Includes( BId varchar(20) ,Gid varchar(20) , primary key (BId,Gid),
foreign key (BId) references BookingPackage(BookingId) ON DELETE cascade,
foreign key (Gid) references GuideDetails(GuideId) ON DELETE cascade, commision double(10,2));

insert into Includes values ("B101","G102",1500.00);
insert into Includes values ("B102","G101",2000.00);
insert into Includes values ("B103","G103",1000.00);
insert into Includes values ("B106","G104",800.00);
insert into Includes values ("B104","G104",800.00);
insert into Includes values ("B105","G103",800.00);
insert into Includes values ("B107","G102",800.00);
insert into Includes values ("B108","G101",800.00);
insert into Includes values ("B109","G104",800.00);

create table enquiry(Eqname varchar(50) not null, Eqphonenumber varchar (20) unique , Eqmessage varchar(255));