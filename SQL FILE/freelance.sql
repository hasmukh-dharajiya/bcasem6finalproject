-- phpMyAdmin SQL Dump
-- version 2.9.0.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 24, 2020 at 04:22 AM
-- Server version: 5.0.27
-- PHP Version: 5.2.0
-- 
-- Database: `freelance`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `admin`
-- 

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `earning` varchar(50) NOT NULL default '0',
  PRIMARY KEY  (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `admin`
-- 

INSERT INTO `admin` (`a_id`, `username`, `password`, `earning`) VALUES 
(1, 'admin', 'admin', '167.8');

-- --------------------------------------------------------

-- 
-- Table structure for table `hire`
-- 

CREATE TABLE `hire` (
  `h_id` int(11) NOT NULL auto_increment,
  `h_fname` varchar(20) NOT NULL,
  `h_lname` varchar(20) NOT NULL,
  `h_email` varchar(25) NOT NULL,
  `h_password` varchar(30) NOT NULL,
  `work` varchar(10) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `con_email` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `profile_pic` text NOT NULL,
  `profile_status` varchar(20) default 'pending',
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY  (`h_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- 
-- Dumping data for table `hire`
-- 

INSERT INTO `hire` (`h_id`, `h_fname`, `h_lname`, `h_email`, `h_password`, `work`, `phone_number`, `con_email`, `city`, `location`, `profile_pic`, `profile_status`, `question`, `answer`) VALUES 
(27, 'hasmukh', 'dharjiya', 'hasmukh001@gmail.com', '8182', 'hire', '8758141053', 'hasmukh8182@gmail.com', 'Botad', 'Botad,Gujarat', 'Screenshot_20200222_115002.jpg', 'conform', 'What is Your Pet Name?', 'dog'),
(28, 'roman', 'vala', 'roman001@gmail.com', '81828182', 'hire', '99999777777', 'roman8182@gmail.com', 'bhavnagar', 'Bhavnagar,Gujarat', 'photo-1506919258185-6078bba55d2a.jfif', 'conform', 'Who is Your Favourite Person?', 'jon'),
(26, 'jone', 'patel', 'jone8182@gmail.com', '81828182', 'hire', '99999999999', 'jonepatel@gmail.com', 'botad', 'Botad,Gujarat', 'images (1).jfif', 'conform', 'What is the Name of Your First School?', 'abc'),
(29, 'Jay', 'Patel', 'jay001@gmail.com', '81828182', 'hire', '1234567890', 'jay8182@gmail.com', 'Surat', 'Surat,Gujarat', 'images (2).jfif', 'conform', 'What is the Name of Your First School?', 'kb'),
(30, 'Aryan', 'Dharajiya', 'aryan001@gmail.com', '81828182', 'hire', '8989898998', 'arayn81812@gmail.com', 'bhavnagar', 'Bhavnagar,Gujarat', 'images.jfif', 'conform', 'What is Your Pet Name?', 'cat'),
(31, 'hasu', 'dharjiya', 'hasubahi8182@gmail.com', '81828182', 'hire', '7297564893', 'hasubhai001@gmail.com', 'surat', 'surat,gujarati', 'images (2).jfif', 'conform', 'Who is Your Favourite Person?', 'hasu');

-- --------------------------------------------------------

-- 
-- Table structure for table `jobs`
-- 

CREATE TABLE `jobs` (
  `j_id` int(11) NOT NULL auto_increment,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `budget` varchar(30) NOT NULL,
  `category` varchar(50) default 'pending',
  `project_file` tinytext,
  `expertise` varchar(100) default NULL,
  `time_duration` varchar(15) default NULL,
  `h_id` varchar(70) default NULL,
  `status` varchar(50) NOT NULL default 'pending',
  `w_id` varchar(50) NOT NULL default 'pending',
  `payment_status` varchar(50) NOT NULL default 'pending',
  `submit_file` varchar(500) NOT NULL default 'pending',
  PRIMARY KEY  (`j_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

-- 
-- Dumping data for table `jobs`
-- 

INSERT INTO `jobs` (`j_id`, `title`, `description`, `budget`, `category`, `project_file`, `expertise`, `time_duration`, `h_id`, `status`, `w_id`, `payment_status`, `submit_file`) VALUES 
(95, 'Expert Logo designer.', 'Iâ€™m looking for an experienced website developer to design an advertisement page for my company.\r\n\r\nI have a high level of detail expectation for the design.				\r\n								\r\n						', '20', 'Design & Creative', 'favicon.ico', 'Communication', '2020-03-06', 'roman001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(96, 'Business Development for Injection Moulding Parts ', 'We are India base company. We are manufacturer of Plastic and Rubber Injection moulding parts as per requirement of customer. we supply these parts to Automotive, Engineering and Energy Sector. We need Business Development executive to develop business for us.				\r\n								\r\n						', '250', 'Engineering & Architecture', 'report_3_print.pdf', 'Business Development || Mechanical Engineering || Customer Development', '2020-04-23', 'roman001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(97, 'Business Development Mechanical Engineering Custom', 'Hello!\r\n\r\nWe are an e-commerce business based in Australia with warehouses in Australia & The US.\r\n\r\nWe are currently implementing a new inventory system and require the assistance of an expert so we get it right!\r\n\r\nThe software and companies we are dealing with are:\r\n\r\n* Ciny7\r\n* Shipbob (based in the US)\r\n\r\nIf you experience setting up and handling the rollout of an inventory system using these two we would love to hear from you!', '300', 'IT & Networking', 'report_1.docx', 'Mechanical Engineering', '2020-03-20', 'jay001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(94, 'Data Analysis - eComm Amazon Company.', 'An eCommerce business looking for someone who can analyze product data in Excel using different programs/extensions. Programs and extensions needed will be provided (as well as any training of these programs). Looking for someone who has experience analyzing and researching products for FBA Amazon. Willing to train a dependable person, but it is a must that you are able to catch on quickly and are someone who has at least a little background with Amazon SC and analyzing data trends. You must als', '150', 'Data Science & Analytics', 'amazone.docx', 'Amazon Seller Central || Data Analysis || Market Research', '2020-03-21', 'roman001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(88, 'Real Estate Attorney or Paralegal', 'Role Requirements\r\nâ€¢ Due diligence for title review\r\nâ€¢ Create & edit contracts & other transactional types of documents\r\nâ€¢ Review agreements, leases, & other transactional documents\r\nâ€¢ Legal research such as: court cases & state/federal statutes\r\nâ€¢ Assist with legal filings or other litigation matters\r\nâ€¢ Manage legal milestones & deadlines\r\nâ€¢ Coordinate with various attorneys & colleagues on legal matters\r\nâ€¢ Prepare and assist with document recording\r\nâ€¢ If license is held, prov', '50', 'Legal', 'final_documentation3.docx', ' Legal Research || Legal Consulting || Contract Law Legal', '2020-02-27', 'jone8182@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(92, 'Admin Support - Upload & Scheduling of Facebook Co', 'Specialized profiles can help you better highlight your expertise when submitting proposals to jobs like these. Create a specialized profile.\r\n\r\nI am looking for somebody to perform up to 2hours work per week uploading & scheduling facebook content for my page and groups.  I will provide the content but I just need somebody trustworthy to add this into the relevant groups etc.				\r\n								\r\n						', '60', 'Admin Support', 'final_documentation3.docx', 'Data Entry || Communication', '2020-03-17', 'roman001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(91, 'Informational Article needed. New writers welcome.', 'I am looking to build a team of writers I can count on for delivering articles on a regular basis\r\n\r\nArticle will be 1500+ words\r\nPay is $5 per  article.\r\n\r\nDetailed instructions will be provided to shortlisted candidates.\r\n\r\nPlease bid $5 for the full project (1 article).\r\n\r\nIf you are interested in this project, Use this sentence as the first sentence of your application\r\n\r\nâ€œI have read the job posting in its entirety"				\r\n								\r\n						', '150', 'Writing', 'final_document.docx', 'writing', '2020-03-14', 'hasmukh001@gmail.com', 'complete', '34', 'approval', 'final_document.docx'),
(93, 'Customer Service and Support.', 'Weâ€™re looking for an experienced Customer Support Rep with an ownership mindset, demonstrating drive, initiative, energy and a sense of urgency to help answer questions from our customers, work with our team to solve issues that come up and manage communication with clients.\r\n\r\nYou will help us develop and deliver customized messaging and training content for each customer during and after implementations.\r\n\r\nYou have outstanding verbal and written communication skills. You have an analytical ', '200', 'Customer Service', 'job.docx', 'Customer Service || Customer Support || Email Handling || Live Chat Operator', '2020-04-01', 'roman001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(87, 'Data visualization engineer to build feature for s', 'Hi! We''re looking for an experienced data science and visualization expert to build out a data exploration feature (ability for user to search through a year''s worth of audio, visually) in our new web app. The complexities of this come from needing to concatenate spectrogram images of a year''s worth of audio, in a diel plot. Check out the attached examples and this article describing the concept: https://www.sciencedirect.com/science/article/pii/S1877050914002403				\r\n								\r\n						', '30', 'Data Science & Analytics', 'final_document.docx', 'D3.js||  R Matplotlib', '2020-03-05', 'jone8182@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(89, 'Web design - Player/Team finder', 'Looking for an experienced website developer to create a football (soccer) player fans to find each other.\r\nThe website should have a Login and Signup for sure so that both football player who wants to play and a team who are looking for a player for their 6a-side match.\r\nA player can both play for another team (Playing), or can search for a player (Searching). The same version which is used in Airbnb - The person can be a host and traveler. He can switch between two accounts in the website very', '100', 'Web, Mobile & Software Dev', 'final_document.docx', 'Web Design || Website Development', '2020-03-31', 'hasmukh001@gmail.com', 'complete', '35', 'approval', 'final_documentation3.docx'),
(90, 'English to Greek Translation of a Landing page.', 'Hello,\r\n\r\nWe are looking for an experienced Greek translator.\r\n\r\nWe have landing pages to translate from English to Greek and we will start with one of them only. If we are happy we can offer the opportunity to work with us on all our English-Greek translations.\r\n\r\nThe landing page is generic English and around the 750 words.\r\n\r\nYour job would be to translate a text document where we will put all the text included in the landing page.\r\n\r\nAttention: This is NOT a literal translation word by word!', '30', 'Translation', 'Chrysanthemum.jpg', 'Translation || Proofreading', '2020-03-22', 'hasmukh001@gmail.com', 'working', '32', 'pending', 'pending'),
(98, 'English to Tagalog Legal Translation.', 'This is an English to Tagalog translation of a common legal document. The deliverable will be an informal document to be used by a non-native speaker of English whose native languages are Visayan and Tagalog. The translated document will be used in a side-by-side comparison with the English document to ensure the contents and commitments are well understood. The English document is about 3,000 words. The completed English document, without signatures, should be available for your translation not', '90', 'Legal', 'report_1.pdf', 'Written || Agreements || English', '2020-03-11', 'jay001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(99, 'Digital Marketer/ Funnel Expert needed to develop ', 'Hello,\r\n\r\nI''m looking for a digital marketing/ funnel expert to help me package my services perfectly towards my ideal market.\r\n\r\nI have a market in mind and would like help to develop a funnel that will turn booked phone call appointments into clients.\r\n\r\nMy ideal market - Advice coaches ( Nutrition, fitness, mindset, financial, etc... )\r\n\r\nThe ideal prospect will have an existing program, course, team and/ or sales system that will take leads into a funnel and turn them into clients.\r\n\r\nMy ser', '60', 'Sales & Marketing', 'report_2.docx', 'Content Marketing Strategy || Market Research || Content Marketing Strategy', '2020-03-15', 'jay001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(100, 'Japanese to English onsite translator, technical', 'Seeking an onsite translator for a small project involving equipment repair. Work will include translation from Japanese to English and vise versa. Spanish speaking a plus.				\r\n								\r\n						', '50', 'Translation', 'report_3.docx', 'English || Japanese', '2020-03-22', 'jay001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(101, 'Website developer needed for a law firm website.', 'You will be asked to answer the following questions when submitting a proposal:\r\n\r\nWhat past project or job have you had that is most like this one and why?\r\nWhat questions do you have about the project?\r\nDo you have suggestions to make this project run successfully?\r\nDo you have any questions about the job description?\r\nWhat challenging part of this job are you most experienced in?				\r\n								\r\n						', '210', 'Web, Mobile & Software Dev', 'report_3_print.pdf', 'Website || Website Redesign || Landing Page', '2020-03-18', 'jay001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(102, 'Long Term Content Writing.', 'Looking for a full time creative content writer who is familiar with SEO and keyword density\r\n- MUST USE BRITISH ENGLISH (NOT ANY OTHER TYPE OF ENGLISH)\r\n- All content must be unique and NOT COPIED\r\n- I will be using tools to verify whether content is plagiarized or not.				\r\n								\r\n						', '70', 'Writing', 'final_documentation3.docx', 'Content Writing || Copywriting || SEO', '2020-03-25', 'aryan001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(103, 'Accounting Specialist needed for High Volume Shopi', 'Requirements\r\n* Must be proficient in Shopify and have previous experience with Shopify.\r\n* Must be proficient in Shipstation and have previous experience with Shipstation.\r\n* Previous experience in bookkeeping/journal entries for e-commerce stores.\r\n* Some quickbooks experience is preferred.\r\n* Must be proficient in Microsoft Excel and interpreting data.\r\n* Monthly accounting reconciliation experience is required.\r\n				\r\n								\r\n						', '340', 'Accounting & Consulting', 'report_3_print.pdf', 'GAAP || Mathematics || MS Excel || NetSuite || Quickbooks', '2020-03-29', 'aryan001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(104, 'Laravel marketplace.', 'I need a professional developer to Develop a new laravel marketplace  \r\n- Powerful backend - laravel for\r\n1. system management and order fulfilment.\r\n2. Admin module with dash board for full management for customers, products and\r\norders\r\n3. Responsive marketplace web portal as frontend for customers supports both RTL and LTR.\r\n- Client appâ€™s - Native apps for iOS by swift and Android using kotln , should support Arabic and English locales and by default the system will use locale Ar-sa, which', '210', 'Admin Support', 'report_1.docx', 'Amazon Seller Central || Data Analysis || Market Research', '2020-03-08', 'aryan001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(105, 'Environmental Industry Research.', 'I''m looking for someone who is well-versed in the field of environmental sustainability/technologies. If you''re an engineer that is a bonus.\r\n\r\nPreferably if you are a university student who wants to get paid doing research into topics he/she is already interested in, or already an expert at.\r\n\r\nI want you to write an in-depth research paper for me investigating up and coming environmental industries. Up and coming technologies in the space.\r\n\r\nIf you are adamant about saving the planet and the ', '320', 'Writing', 'report_3_print.pdf', 'Technology || Energy & Utilities || Scientific & Technical Services', '2020-03-23', 'aryan001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(106, 'Find a local buyer in Bern for a premium domain na', 'Hello, I''m a domain seller, and hold the following premium domain name for any local business in Bern that is looking for one of the best possible domains in the market.\r\nThe domain name that I''m putting for sale is: *Bern.co*\r\nIt''s a one-word, 5 characters, premium name that can brand any of the following businesses:\r\n- Companies\r\n- Corporates\r\n- Trades\r\n- Event and conferences\r\n- Import & export\r\n- Travel\r\n- Lawyers\r\n- Government				\r\n								\r\n						', '500', 'IT & Networking', 'report_3_print.pdf', 'Lead Generation || Partnership || Development Negotiation', '2020-03-19', 'aryan001@gmail.com', 'pending', 'pending', 'pending', 'pending'),
(107, 'Ghost-writing: Accounting/Finance articles.', '1. Accounting & Robotics\r\n2. Finance (recent developments)\r\n3. Accounting (recent developments: IAS, GAAP etc.)\r\n4. Block chain & Cryptocurrency\r\n5. Business & Economics related.\r\n6. Financial Reporting.				\r\n								\r\n						', '120', 'Accounting & Consulting', 'report_3_print.pdf', 'Article Writing || Business Writing', '2020-03-04', 'hasubahi8182@gmail.com', 'pending', 'pending', 'pending', 'pending');

-- --------------------------------------------------------

-- 
-- Table structure for table `massage`
-- 

CREATE TABLE `massage` (
  `m_id` int(11) NOT NULL auto_increment,
  `h_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `sms` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL default 'pending',
  PRIMARY KEY  (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `massage`
-- 

INSERT INTO `massage` (`m_id`, `h_id`, `w_id`, `j_id`, `sms`, `date`, `status`) VALUES 
(1, 27, 32, 90, 'hiii ajay welcome my job', '24-02-2020', 'send by hire'),
(2, 27, 32, 90, 'hiii sir Thanks for hire job .', '24-02-2020', 'send by worker'),
(3, 27, 32, 90, 'I Am Work Fast And better', '24-02-2020', 'send by worker'),
(4, 27, 32, 90, 'ohk..', '24-02-2020', 'send by hire');

-- --------------------------------------------------------

-- 
-- Table structure for table `notification`
-- 

CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL auto_increment,
  `subject` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `w_id` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `h_id` varchar(50) NOT NULL,
  PRIMARY KEY  (`n_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=886 ;

-- 
-- Dumping data for table `notification`
-- 

INSERT INTO `notification` (`n_id`, `subject`, `message`, `w_id`, `time`, `h_id`) VALUES 
(811, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '22-02-2020', '24'),
(812, 'Job Post Sucessfully.', 'Hiii hasmukh,dharjiya You Are Sucessfully Posted Job --> first php project demo.', '', '22-02-2020', '24'),
(813, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '32', '22-02-2020', ''),
(814, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '33', '22-02-2020', ''),
(815, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '34', '22-02-2020', ''),
(816, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '35', '22-02-2020', ''),
(817, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '36', '22-02-2020', ''),
(818, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '37', '22-02-2020', ''),
(819, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '38', '22-02-2020', ''),
(820, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '39', '22-02-2020', ''),
(821, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '40', '22-02-2020', ''),
(822, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '41', '22-02-2020', ''),
(823, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '22-02-2020', '25'),
(824, 'Job Post Sucessfully.', 'Hiii hasmukh,dharjiya You Are Sucessfully Posted Job --> Gmail / yahoo / outlook email account setup (data entry).', '', '22-02-2020', '25'),
(825, 'Job Post Sucessfully.', 'Hiii hasmukh,dharjiya You Are Sucessfully Posted Job --> We Need a Financial Accounting Professional.', '', '22-02-2020', '25'),
(826, 'Job Post Sucessfully.', 'Hiii hasmukh,dharjiya You Are Sucessfully Posted Job --> Dedicated Administrative Assistant needed for Eldercare Planning Company.', '', '22-02-2020', '25'),
(827, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '22-02-2020', '26'),
(828, 'Job Post Sucessfully.', 'Hiii jone,patel You Are Sucessfully Posted Job --> Data visualization engineer to build feature for scientific tool (D3, R, matlab).', '', '22-02-2020', '26'),
(829, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '22-02-2020', '26'),
(830, 'Job Post Sucessfully.', 'Hiii jone,patel You Are Sucessfully Posted Job --> Real Estate Attorney or Paralegal.', '', '22-02-2020', '26'),
(831, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '23-02-2020', '25'),
(832, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '23-02-2020', '27'),
(833, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '35', '23-02-2020', ''),
(834, 'Job Post Sucessfully.', 'Hiii hasmukh,dharjiya You Are Sucessfully Posted Job --> Web design - Player/Team finder.', '', '23-02-2020', '27'),
(835, 'Proposal Send Successfully.', 'Worker You Are Successfully Proposal Send Of This Job--> Web design - Player/Team finder', '35', '23-02-2020', ''),
(836, 'New Proposal Recived.', 'New Proposal Recived Of This Job--> Web design - Player/Team finder', '', '23-02-2020', '27'),
(837, 'Accept Job Successfully.', 'Worker You Are Successfully Recived Job Plaese Work Fast And Submit soon..', '35', '23-02-2020', ''),
(838, 'congratulations.', 'congratulations Your Proposal Accept Plaese Check SAVE/WORKING JOB', '', '23-02-2020', '27'),
(839, 'congratulations Job Approved Update Earning is 80', 'Job Approved Successfully And credit 80  And Update Earning is 80 ', '35', '23-02-2020', ''),
(840, 'Job Post Sucessfully.', 'Hiii hasmukh,dharjiya You Are Sucessfully Posted Job --> English to Greek Translation of a Landing page..', '', '23-02-2020', '27'),
(841, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '34', '23-02-2020', ''),
(842, 'Proposal Send Successfully.', 'Worker You Are Successfully Proposal Send Of This Job--> English to Greek Translation of a Landing page.', '34', '23-02-2020', ''),
(843, 'New Proposal Recived.', 'New Proposal Recived Of This Job--> English to Greek Translation of a Landing page.', '', '23-02-2020', '27'),
(844, 'Proposal Send Successfully.', 'Worker You Are Successfully Proposal Send Of This Job--> English to Greek Translation of a Landing page.', '34', '23-02-2020', ''),
(845, 'New Proposal Recived.', 'New Proposal Recived Of This Job--> English to Greek Translation of a Landing page.', '', '23-02-2020', '27'),
(846, 'Job Post Sucessfully.', 'Hiii hasmukh,dharjiya You Are Sucessfully Posted Job --> Informational Article needed. New writers welcome..', '', '23-02-2020', '27'),
(847, 'New Proposal Recived.....', 'New Proposal Recived By This Job--> Informational Article needed. New writers welcome.', '32', '23-02-2020', ''),
(848, 'Proposal Successfully Send.', 'Proposal Successfully Send by this Job --> Informational Article needed. New writers welcome.', '', '23-02-2020', '27'),
(849, 'New Proposal Recived.....', 'New Proposal Recived By This Job--> Informational Article needed. New writers welcome.', '34', '23-02-2020', ''),
(850, 'Proposal Successfully Send.', 'Proposal Successfully Send by this Job --> Informational Article needed. New writers welcome.', '', '23-02-2020', '27'),
(851, 'Accept Job Successfully.', 'Worker You Are Successfully Recived Job Plaese Work Fast And Submit soon..', '34', '23-02-2020', ''),
(852, 'congratulations.', 'congratulations Your Proposal Accept Plaese Check SAVE/MYHIRE', '', '23-02-2020', '27'),
(853, 'congratulations Job Approved Update Earning is 120', 'Job Approved Successfully And credit 120  And Update Earning is 120 ', '34', '23-02-2020', ''),
(854, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '27'),
(855, 'New Proposal Recived.....', 'New Proposal Recived By This Job--> English to Greek Translation of a Landing page.', '32', '24-02-2020', ''),
(856, 'Proposal Successfully Send.', 'Proposal Successfully Send by this Job --> English to Greek Translation of a Landing page.', '', '24-02-2020', '27'),
(857, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '32', '24-02-2020', ''),
(858, 'Accept Job Successfully.', 'Worker You Are Successfully Recived Job Plaese Work Fast And Submit soon..', '32', '24-02-2020', ''),
(859, 'congratulations.', 'congratulations Your Proposal Accept Plaese Check SAVE/MYHIRE', '', '24-02-2020', '27'),
(860, 'New Massage Recived', 'please Check new massage.', '32', '24-02-2020', ''),
(861, 'New Massage Recived', 'please Check new massage.', '32', '24-02-2020', ''),
(862, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '28'),
(863, 'Job Post Sucessfully.', 'Hiii roman,vala You Are Sucessfully Posted Job --> Admin Support - Upload & Scheduling of Facebook Content..', '', '24-02-2020', '28'),
(864, 'Job Post Sucessfully.', 'Hiii roman,vala You Are Sucessfully Posted Job --> Customer Service and Support..', '', '24-02-2020', '28'),
(865, 'Job Post Sucessfully.', 'Hiii roman,vala You Are Sucessfully Posted Job --> Data Analysis - eComm Amazon Company..', '', '24-02-2020', '28'),
(866, 'Job Post Sucessfully.', 'Hiii roman,vala You Are Sucessfully Posted Job --> Expert Logo designer..', '', '24-02-2020', '28'),
(867, 'Job Post Sucessfully.', 'Hiii roman,vala You Are Sucessfully Posted Job --> Business Development for Injection Moulding Parts in Plastic and Rubber..', '', '24-02-2020', '28'),
(868, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '29'),
(869, 'Job Post Sucessfully.', 'Hiii Jay,Patel You Are Sucessfully Posted Job --> Business Development Mechanical Engineering Customer Development..', '', '24-02-2020', '29'),
(870, 'Job Post Sucessfully.', 'Hiii Jay,Patel You Are Sucessfully Posted Job --> English to Tagalog Legal Translation..', '', '24-02-2020', '29'),
(871, 'Job Post Sucessfully.', 'Hiii Jay,Patel You Are Sucessfully Posted Job --> Digital Marketer/ Funnel Expert needed to develop sales & marketing strategy.', '', '24-02-2020', '29'),
(872, 'Job Post Sucessfully.', 'Hiii Jay,Patel You Are Sucessfully Posted Job --> Japanese to English onsite translator, technical.', '', '24-02-2020', '29'),
(873, 'Job Post Sucessfully.', 'Hiii Jay,Patel You Are Sucessfully Posted Job --> Website developer needed for a law firm website..', '', '24-02-2020', '29'),
(874, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '30'),
(875, 'Job Post Sucessfully.', 'Hiii Aryan,Dharajiya You Are Sucessfully Posted Job --> Long Term Content Writing..', '', '24-02-2020', '30'),
(876, 'Job Post Sucessfully.', 'Hiii Aryan,Dharajiya You Are Sucessfully Posted Job --> Accounting Specialist needed for High Volume Shopify Stores..', '', '24-02-2020', '30'),
(877, 'Job Post Sucessfully.', 'Hiii Aryan,Dharajiya You Are Sucessfully Posted Job --> Laravel marketplace..', '', '24-02-2020', '30'),
(878, 'Job Post Sucessfully.', 'Hiii Aryan,Dharajiya You Are Sucessfully Posted Job --> Environmental Industry Research..', '', '24-02-2020', '30'),
(879, 'Job Post Sucessfully.', 'Hiii Aryan,Dharajiya You Are Sucessfully Posted Job --> Find a local buyer in Bern for a premium domain name..', '', '24-02-2020', '30'),
(880, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '31'),
(881, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '31'),
(882, 'Job Post Sucessfully.', 'Hiii hasu,dharjiya You Are Sucessfully Posted Job --> Ghost-writing: Accounting/Finance articles..', '', '24-02-2020', '31'),
(883, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '29'),
(884, 'Login Sucessfully.', 'Hiii Worker You Are Sucessfully Loging.', '32', '24-02-2020', ''),
(885, 'Login Sucessfully', 'Hiii Hire You Are Sucessfully Loging ', '', '24-02-2020', '27');

-- --------------------------------------------------------

-- 
-- Table structure for table `proposal`
-- 

CREATE TABLE `proposal` (
  `p_id` int(11) NOT NULL auto_increment,
  `w_id` varchar(50) NOT NULL,
  `j_id` int(11) NOT NULL,
  `h_id` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL default 'pending',
  `time` varchar(50) NOT NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=158 ;

-- 
-- Dumping data for table `proposal`
-- 

INSERT INTO `proposal` (`p_id`, `w_id`, `j_id`, `h_id`, `status`, `time`) VALUES 
(157, '32', 90, 'hasmukh001@gmail.com', 'conform', '24-02-2020'),
(156, '34', 91, 'hasmukh001@gmail.com', 'conform', '23-02-2020'),
(155, '32', 91, 'hasmukh001@gmail.com', 'pending', '23-02-2020');

-- --------------------------------------------------------

-- 
-- Table structure for table `proposal_hire`
-- 

CREATE TABLE `proposal_hire` (
  `p_id` int(11) NOT NULL auto_increment,
  `w_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL default 'pending',
  `time` varchar(50) NOT NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `proposal_hire`
-- 

INSERT INTO `proposal_hire` (`p_id`, `w_id`, `j_id`, `h_id`, `status`, `time`) VALUES 
(1, 35, 89, 27, 'conform', '23-02-2020'),
(3, 34, 90, 27, 'pending', '23-02-2020');

-- --------------------------------------------------------

-- 
-- Table structure for table `work`
-- 

CREATE TABLE `work` (
  `w_id` int(11) NOT NULL auto_increment,
  `w_fname` varchar(20) NOT NULL,
  `w_lname` varchar(20) NOT NULL,
  `w_email` varchar(25) NOT NULL,
  `w_password` varchar(30) NOT NULL,
  `work` varchar(10) NOT NULL,
  `dname` varchar(30) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `con_email` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `profile_pic` text NOT NULL,
  `description` varchar(500) NOT NULL,
  `level` varchar(20) NOT NULL,
  `categories` varchar(50) NOT NULL default 'n',
  `skill` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `study_area` varchar(100) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `exp_description` varchar(500) NOT NULL,
  `complete_job` varchar(10) NOT NULL default '0',
  `earning` varchar(50) NOT NULL default '0',
  `profile_status` varchar(20) default 'pending',
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY  (`w_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- 
-- Dumping data for table `work`
-- 

INSERT INTO `work` (`w_id`, `w_fname`, `w_lname`, `w_email`, `w_password`, `work`, `dname`, `phone_no`, `con_email`, `city`, `location`, `title`, `profile_pic`, `description`, `level`, `categories`, `skill`, `degree`, `study_area`, `subject`, `exp_description`, `complete_job`, `earning`, `profile_status`, `question`, `answer`) VALUES 
(33, 'mahesh', 'mer', 'mahesh001@gmail.com', '81828182', 'work', '', 2147483647, 'mahesh8182@gmail.com', 'Botad', 'Goradka,Botad,Gujarat', 'Graphic Designer', 'Screenshot_20200222_114339_com.instagram.android.jpg', 'Iâ€™m a graphic designer with expertise in logo and brand identity design. I create visual concepts by hand or digitally.\r\n\r\nIn 2005 I started doing print design projects locally and continue online since 2007. I''ve been always fascinated with web and UI design.\r\n\r\nAs an Upwork Top Rated freelancer, I work hard and take pride in the work I do, caring about the quality of work and service I am performing. I respond well to a challenge and enjoy the rewards of hard work and dedication. I love work', 'Intermediate', 'Design & Creative', 'Logo Design || Print Design || User Interface Design || Adobe Illustrator || Web Design', 'BCA || MCA', 'botad,adarsh', 'graphic developer', 'In 2005 I started doing print design projects locally and continue online since 2007. I''ve been always fascinated with web and UI design.', '0', '0', 'conform', 'What is Your Pet Name?', 'dog'),
(32, 'ajay', 'vaghela', 'ajay001@gmail.com', '81828182', 'work', '', 2147483647, 'ajayvaghela@gmail.com', 'botad', 'Botad,Gujarat', 'Web & Mobile Interface (UI) Designer', 'Screenshot_20200222_114441.jpg', 'Senior user interface (UI) designer with 8+ years of experience accredited as PRO Designer by Upwork. I work mainly in Sketch (expert), Adobe Photoshop (expert) and Adobe Illustrator (expert). I have been working with Lexus, Toyota and G4S. Apart from UI Design I also find myself good at doing logos and corporate identity. It is my passion to deliver usable pixel perfect design solutions. I am looking for design work, where I will be trusted as a designer and have enough freedom to propose creat', 'Expert', 'Accounting & Consulting', 'Web Design || User Interface Design || Mobile UI Design || User Experience Design || Adobe Photoshop', 'BCA || MCA', 'botad,kb', 'Android developer', '2 year Android developer Exp..', '0', '0', 'conform', 'Who is Your Favourite Person?', 'hasu'),
(34, 'jayesh', 'dharjiya', 'jayesh001@gmail.com', '81828182', 'work', '', 2147483647, 'jayeshdharjiya001@gmail.com', 'surat', 'Surat,Gujarat', 'Full-Stack / Front End Developer with UI/UX design', 'Screenshot_20200222_115027.jpg', 'During past 8 years, I have more than 100 projects of various complexity built.\r\nWith extensive HTML/CSS experience, I am very comfortable taking a creative design and building it out into clean, semantic, reusable, user-friendly code. I am currently very interested in building projects in Angular, React or Vue\r\n\r\nMy skillset include:\r\n\r\nâœ”ï¸ Website, logo and email design\r\nâœ”ï¸ HTML5, CSS3, SASS, Bootstrap 4.x\r\nâœ”ï¸ Javascript ES6, AngularJS, ReactJS, VueJS\r\nâœ”ï¸ PHP, Laravel, Custom MV', 'Intermediate', 'Writing', 'Web Design || HTML5 || CSS3 || JavaScript || PHP || PSD to HTML', 'BCA || MSC(it)', 'botad,adarsh', 'UX design ', 'During past 8 years, I have more than 100 projects of various complexity built. With extensive HTML/CSS experience, I am very comfortable taking a creative design and building it out into clean, semantic, reusable, user-friendly code.', '1', '120', 'conform', 'What is Your Pet Name?', 'dog'),
(35, 'jayendr', 'solanki', 'jayendr001@gmail.com', '81828182', 'work', '', 2147483647, 'jayeshdharjiya001@gmail.com', 'botad', 'Botad,Gujarat', 'Technical Support Architect & Marketing Content St', 'Screenshot_20200222_114640.jpg', 'I design support experiences that turn customers with technical problems into loyal brand advocates. Using technical support centers, knowledge bases, support team training, and in-app messaging, I can help your company exceed customer expectations even before a support ticket is issued.\r\n\r\nI have extensive experience identifying pain points, making recommendations for development teams, and supporting the support content itself by creating detailed support center guidelines for support staff.\r\n', 'Entry level', 'Customer Service', 'Technical Documentation || Technical Support || Project Management || Project Management Professiona', 'BCA || MCA', 'botad Adharsh BCA college', 'Full time technical support for a software product', 'I have extensive experience identifying pain points, making recommendations for development teams, and supporting the support content itself by creating detailed support center guidelines for support staff.', '1', '80', 'conform', 'What is the Name of Your First School?', 'kb'),
(36, 'mehul', 'gohil', 'mehul001@gmail.com', '81828182', 'work', '', 2147483647, 'mehul8182@gmail.com', 'barvala', 'Barvala,Gujarat', 'Effective Business Blog and Article Writing | SEO ', 'Screenshot_20200222_114926.jpg', 'You have a business that you believe in, and you want to get people to notice.\r\nLet me help you out with that.\r\n\r\nTESTIMONIALS FROM PAST CLIENTS\r\nâ€”â€”â€”â€”\r\n"Nathan does a great job of staying on task, providing great work and meeting deadlines. Will be working with him again."\r\n\r\n"Nathan was fantastic to work with! Great communication skills and a unique way with words. Would recommend to anyone looking for a copywriter."\r\nâ€”â€”â€”â€”\r\nYou know that well-written content is the key to drivin', 'Intermediate', 'Sales & Marketing', 'Copywriting || Content Writing || Article Writing || Blog Writing', 'BCA || MCA', 'Baravala mk gandhi BCA college', 'SCO developer', 'But truly excellent content will do much more than simply give your customers something to glance over once they find you.', '0', '0', 'conform', 'What is Your Pet Name?', 'cat'),
(37, 'nikunj', 'virja', 'nikunj001@gmail.com', '81828182', 'work', '', 2147483647, 'nikunj8182@gmail.com', 'shirvaniya', 'Botad,Gujarat', 'Financial Writer - Forex & Equities', 'Screenshot_20200222_114745.jpg', 'After earning my degree in International Business from Swinburne University of Technology, Australia, I started my career as a Business Development Executive for an ISO 9001-2008 Certified Management Consulting firm, where my responsibilities included writing expression of interests (EOIs), as well as technical and financial proposals for multi-million dollar development projects.\r\n\r\nLater, I worked as a prop trader and managed trading operations for large-scale foreign exchange strategy develop', 'Expert', 'Writing', 'Business Writing || Content Writing || Blog Writing', 'BCA || MSC(it)', 'botad Adharsh BCA college', 'Business Writing', 'Later, I worked as a prop trader and managed trading operations for large-scale foreign exchange strategy developers. Currently, I work as a trading consultant to several brokers and write about various tech and financial topics for a handful of publications.', '0', '0', 'conform', 'What is the Name of Your First School?', 'adharsh'),
(38, 'jainam', 'shah', 'jainam001@gmail.com', '81828182', 'work', '', 1234567891, 'jainam8182@gmail.com', 'Ugamedi', 'Ugamedi,Botad', 'Lawyer & Freelance Writer', 'Screenshot_20200222_114522.jpg', 'I am a licensed Utah attorney with a background in business law and contract law. I strive to provide quality work in a timely manner, and set clear expectations as to costs and deliverables. I have plenty of experience with various legal documents, contracts, business formation and general counsel work.\r\n\r\nIn general, I offer flat rate fees for many services. However, I am available on an hourly rate for legal research and advice as well.\r\n\r\nI also work as a freelance writer on the side. I have', 'Intermediate', 'Legal', 'Legal Writing || Sports Writing || Legal Research || Blog Writing', 'BCA || MCA', 'Ugamedi ABC BCA college', 'Legal developer', 'In general, I offer flat rate fees for many services. However, I am available on an hourly rate for legal research and advice as well.', '0', '0', 'conform', 'What is the Name of Your First School?', 'kb'),
(39, 'himalay', 'joshi', 'himalay001@gmail.com', '81828182', 'work', '', 1234512345, 'himalay8182@gmail.com', 'Dhola', 'Dhola,Gujarat', 'English-Brazilian Portuguese Translation, SEO, Wri', 'Screenshot_20200222_114848.jpg', 'Right now you have reached hundreds of profiles on Upwork, all talking about how good they are and what they can do for you.\r\n\r\nI can also talk that i am a digital marketing, Public Relations and SEO expert with content marketing and copywriting skills and half a decade experience working to the biggest companies and clients in the world and Upwork...\r\n\r\nand yet a blog writer at big publications in Brazil with a solid background, committed and professional.\r\n\r\nBut... doest it really matter?\r\n\r\nW', 'Expert', 'Translation', 'Technical Translation || Article Writing || Blog Writing || Writing', 'BCA || MCA', 'Dhola Gandhi BCA college', 'Technical Translation', 'You want more? I never had a job below 100% satisfaction and I have 4 years on Upwork. Yes, i have a 100% client satisfaction.', '0', '0', 'conform', 'What is Your Pet Name?', 'cat'),
(40, 'kevin', 'undaviya', 'kevin001@gmail.com', '81828182', 'work', '', 2147483647, 'kevin8182@gmail.com', 'Dhola', 'Dhola,Gujarat', 'Graphics Design/Animation/Video Production Expert', 'Screenshot_20200222_115223.jpg', 'I have been a professional Graphics Designer, Animator and Video producer for over 3 years, creating Advertisements, Flyers, Illustrations etc. for various companies and individuals. My work is driven by my passion and polished by my skills and experiences of working as a professional. I offer you unique, fun and creative graphics to turn your project in to a work of art and you can get as many revisions as you would like.\r\n\r\nMy Services include :\r\n\r\nâ€¢ 2d Animation, Whiteboard Animations ( Exp', 'Intermediate', 'Design & Creative', '2D Animation || Graphic Design || Animation || Video Production', 'BCA || MSC(it)', 'Dhola', 'Animation ', 'â€¢ 2d Animation, Whiteboard Animations ( Explainer Videos, Advertisements, Cartoons etc.) â€¢ Illustrations ( Character Designs, Cartooning, Game Assets, Backgrounds etc.) â€¢ Graphics Design ( Flyers, Posters, Logos, PSD Templates for Webdesign etc.)', '0', '0', 'conform', 'What is the Name of Your First School?', 'lathi'),
(41, 'yogesh', 'parmar', 'yogesh001@gmail.com', '81828182', 'work', '', 2147483647, 'yogesh8182@gmail.com', 'Rajkot', 'Rajkot,Gujarat', 'Sr. System Administrator | DevOPS | Cloud Speciali', 'Screenshot_20200222_115143.jpg', 'I am a System Administrator, DevOPS, Cloud Specialist and programmer with over 15 years expirience who looks for challenging new projects for me and my company. Well-versed in the latest computer languages, operating systems, network and system administration techniques, seeking a positions where my hands-on self-motivating passion with the technology provides me with a unique understanding of how to balance conflicting requirements and bring complex enterprise level IT projects to a successful ', 'Intermediate', 'Engineering & Architecture', 'Computer Networking || Network Administration || Windows Administration', 'BCA || MSC(it)', 'rajkot,abc', 'Windows Administration', 'In 2005 I started doing print design projects locally and continue online since 2007. I''ve been always fascinated with web and UI design.', '0', '0', 'conform', 'What is Your Pet Name?', 'dog');
