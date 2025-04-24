-- MySQL dump 10.13  Distrib 5.7.39, for osx11.0 (x86_64)
--
-- Host: 127.0.0.1    Database: gerobak_listrik
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_time_of_publication` datetime DEFAULT NULL,
  `category_article` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_id` bigint unsigned DEFAULT NULL,
  `views` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_authorid_foreign` (`author_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (54,'Consequatur magnam ad quo quia expedita non ut.','Minus ut maiores et placeat omnis accusamus distinctio. Natus natus non eum accusantium eligendi eum ab. Aut soluta quas at hic possimus omnis optio.\n\nReiciendis occaecati a placeat molestias autem ipsam voluptatem. Eligendi ex error est quod nostrum laudantium incidunt. Nulla modi inventore ratione sit voluptatem quia illum qui. Ut aliquid vitae ut iste blanditiis.\n\nAccusantium omnis qui animi alias cupiditate quas. Error laborum quidem esse voluptates. Ut nostrum libero dolorem veniam quis. Laborum et fugit cupiditate blanditiis illo saepe.','https://via.placeholder.com/640x480.png/004477?text=articles+Article+laboriosam','2025-02-11 09:04:14','Finance','voluptas,quo,aliquid',1,34,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(55,'Aperiam est eaque est eos modi rerum eveniet quia.','Ut at aspernatur maiores suscipit. Quia quasi sint accusantium quam et. Ipsa ut voluptate et.\n\nA et dolorum aliquid quas. Dolores ipsam blanditiis alias voluptas modi. Quod id laborum ducimus sit consequatur quod quaerat. Est aperiam hic molestiae voluptate qui sed iusto voluptatibus.\n\nIure itaque iusto vel sit assumenda corporis. Sint delectus quis rerum velit itaque reprehenderit non. Quae et deleniti reprehenderit temporibus occaecati porro fuga.','https://via.placeholder.com/640x480.png/006622?text=articles+Article+accusamus','2025-03-16 08:50:45','Lifestyle','inventore,numquam,quo',2,443,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(56,'Eveniet vitae incidunt ut iste architecto repellat beatae voluptatem.','Quis ut id repellendus quos et quaerat facilis. Voluptatem quos minima nostrum dolorem. Qui maxime veritatis ratione iste quae. Rerum similique dolorem corporis et est molestiae. Reiciendis quos temporibus pariatur similique culpa eos reiciendis quas.\n\nQuam aut nisi eius quae. Rerum cupiditate esse ipsum impedit voluptatem. Autem consequatur blanditiis aut et minima sit aut repellendus. Quaerat cupiditate vel est explicabo et et et.\n\nEt odio laudantium cumque omnis animi ut. Dolorem aut earum dignissimos laboriosam est et quia sit. Qui numquam ab non similique.','https://via.placeholder.com/640x480.png/001122?text=articles+Article+odio','2025-03-30 11:57:47','Travel','facere,voluptas,expedita',1,626,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(57,'Rerum nobis accusamus quis ut est velit.','Ratione consequatur odit voluptates iste debitis harum. Quisquam impedit ipsum ratione non nihil.\n\nAsperiores sed quibusdam non blanditiis accusamus quaerat sed. Perspiciatis corrupti quasi quis ea error enim similique corporis. Dolores ut totam voluptatibus fuga ipsum quae dolores.\n\nNon reprehenderit mollitia ut nobis est et ut. Ut fugiat dignissimos id voluptatem officiis alias sed. Deserunt molestiae et voluptate sunt nostrum beatae eligendi soluta.','https://via.placeholder.com/640x480.png/00eebb?text=articles+Article+voluptate','2024-05-04 03:56:22','Finance','est,quia,quisquam',1,814,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(58,'Sunt voluptatibus dignissimos dolore doloribus consequatur.','Et quo expedita non nihil eum asperiores. Voluptate non atque autem est. Nostrum omnis pariatur aliquid expedita quo dolores. Quas voluptatem sed accusamus aspernatur nihil.\n\nBeatae impedit alias modi illo in. Eaque odit odio nihil nulla dolore id ipsum. Corrupti at aut qui velit quia quia rerum sint. Omnis nam omnis rerum et sit architecto.\n\nNatus sed consequatur doloribus odio beatae. Eveniet dolores rerum quod. Incidunt quidem nulla suscipit expedita quia blanditiis.','https://via.placeholder.com/640x480.png/00bb55?text=articles+Article+ratione','2024-07-20 01:30:47','Tech','a,nesciunt,deleniti',1,828,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(59,'Laborum ea cumque numquam quis fuga sapiente.','Vero temporibus nobis ullam officia consequatur quas. Fugiat exercitationem itaque qui ipsum voluptatem eum.\n\nMolestias consequatur ut est. Ut voluptatem vel qui animi iure natus. Dolorem distinctio aut id perspiciatis commodi.\n\nOdit repellat hic voluptatem iusto. Quia voluptatem nisi est delectus sint. Dolor voluptas facere eum odio.','https://via.placeholder.com/640x480.png/00bb44?text=articles+Article+quisquam','2024-05-12 06:53:39','Lifestyle','odit,alias,voluptatibus',3,733,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(60,'Consequatur rerum reiciendis amet ut.','Nesciunt dolor beatae qui esse aut iure. Culpa praesentium sit ut sint. Iste aut nemo sed earum facere. Placeat ducimus quos repudiandae placeat animi dolores quod. Ut quisquam nulla nostrum in quaerat quam unde est.\n\nAd ipsa quisquam fugiat. Harum neque eaque eaque iusto. Omnis nemo laborum dolores enim.\n\nNeque hic quis consequatur voluptate dolorem voluptatem sit tempore. Sed commodi itaque aut doloremque fugit consectetur. Accusamus non odio quaerat sequi nulla nobis ut.','https://via.placeholder.com/640x480.png/00bbaa?text=articles+Article+non','2025-03-08 10:40:28','Travel','exercitationem,perferendis,optio',3,538,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(61,'Quis sit quas eum eligendi.','Dolorum sequi id quis magni. Corporis repellat veritatis eum voluptatem dolore. Nihil eos illum enim nobis. Assumenda modi assumenda deleniti corporis vero aut. Labore facere ratione ut eius tempore voluptatum.\n\nVoluptas commodi sunt doloribus eaque. Unde sequi ipsa quae aut. Ex aut ut accusamus aliquid omnis tenetur. Id nobis quo voluptatem natus et.\n\nTempore architecto consequatur soluta quidem velit blanditiis modi. Sit voluptatem qui fugit quis. Aliquam occaecati voluptatem tempore aut quam ut.','https://via.placeholder.com/640x480.png/005577?text=articles+Article+illo','2024-10-26 20:37:11','Tech','itaque,commodi,saepe',2,515,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(62,'Non sint debitis similique quaerat odio eaque.','Harum est doloremque nobis magni esse molestias et similique. Nam cupiditate et tempora voluptatum et quaerat. Quis provident quasi tempore iste consectetur fugiat tenetur. Non molestiae facere iure quis accusantium minima.\n\nEos magni accusamus nisi in inventore esse ut architecto. Voluptatem minima similique laboriosam voluptates aspernatur. Itaque accusantium iure veritatis ut nam non atque. Consequuntur iste aliquid hic.\n\nVoluptatibus et blanditiis asperiores. Alias excepturi perspiciatis asperiores aperiam sunt autem laudantium. Vitae iure sed quo dolorem asperiores est aliquid. Deleniti architecto nam nam quas.','https://via.placeholder.com/640x480.png/0066cc?text=articles+Article+praesentium','2024-10-18 07:48:08','Tech','repellat,totam,maiores',2,634,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(63,'Autem quia quia vel iure.','Totam aspernatur est reiciendis sint officia totam. Dolorem ipsam omnis amet cupiditate sed. Est illo ex itaque quia ex non rerum quaerat.\n\nSunt cum rerum animi minus. Quo in doloribus distinctio perferendis cumque nesciunt quis explicabo. Quidem quaerat eos voluptatem error.\n\nFugiat ut aperiam dicta iusto omnis odio. Ducimus qui nemo ut quia. Nulla accusamus consectetur voluptatibus doloremque consequatur. Est explicabo qui numquam accusantium ut corrupti.','https://via.placeholder.com/640x480.png/0055cc?text=articles+Article+omnis','2024-11-22 04:42:14','Finance','consequuntur,nam,eos',3,800,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(64,'Nisi saepe expedita corporis saepe vel enim sunt dicta.','Omnis aut consequatur voluptatem quam. Ut dolore illum nulla autem ut nulla illum natus. Recusandae fugiat minima qui quia molestiae quam perferendis.\n\nQuasi tempora ullam est omnis neque explicabo sed. Provident adipisci minus eos nihil culpa expedita impedit. Enim ut accusantium consectetur qui necessitatibus nobis.\n\nSit consequuntur est aspernatur velit iste quis maiores. Sit iusto quasi commodi numquam sed. Eum consequatur et nam quis cupiditate quidem fugit. Et modi totam saepe nostrum.','https://via.placeholder.com/640x480.png/003377?text=articles+Article+inventore','2024-10-04 22:46:55','Health','enim,unde,excepturi',1,764,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(65,'Fuga ex aliquid veniam perspiciatis.','Quis et vel aspernatur magnam dolores consequatur molestias. Voluptates dolor optio eos quidem quidem sunt dolor ab. Expedita ipsum expedita non tempora repudiandae. Distinctio magni eveniet fugit nihil fugiat.\n\nDeserunt fugiat iusto accusamus omnis soluta repellat. Eos voluptatem error dolore occaecati laborum et consequatur. Consequatur impedit qui tempore sunt sapiente assumenda explicabo.\n\nQuisquam ut provident ex sed. Natus ullam laudantium temporibus hic. Est exercitationem dignissimos atque minima in deleniti excepturi. Eos ut velit voluptatem.','https://via.placeholder.com/640x480.png/0099ff?text=articles+Article+non','2024-09-22 11:56:02','Health','facilis,dignissimos,iste',1,200,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(66,'Nostrum libero totam et doloremque.','Unde veritatis minus eaque magnam eum id id. Deserunt est dolore nostrum dignissimos. Non accusantium est veritatis non hic sint ut nulla.\n\nPerspiciatis voluptatem modi eligendi et distinctio laudantium culpa. Quasi occaecati est expedita aut consequatur quos id quo. Ad culpa quibusdam ut pariatur ut qui consequuntur.\n\nDoloremque delectus odio id culpa. Excepturi quod consequuntur consequatur vitae. Quisquam dolores dolore doloremque et voluptas dignissimos quia. Consequuntur doloribus rerum nihil eos pariatur dolorem.','https://via.placeholder.com/640x480.png/0066cc?text=articles+Article+maiores','2025-04-23 10:40:50','Travel','enim,aliquam,iusto',2,586,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(67,'Veritatis quos perferendis voluptatem vel placeat accusantium.','Voluptatem non quidem consectetur natus. Omnis earum quidem nisi porro perspiciatis iste. Porro ratione quia voluptas et ea labore. Doloremque minima qui et consequatur voluptatem. Mollitia inventore et vitae earum dolor.\n\nReiciendis esse eum autem dolor hic. In nobis quos eligendi repudiandae soluta delectus tempora. Praesentium qui molestiae sint cum optio.\n\nNemo reprehenderit fuga cumque dolor corporis. Dolores quas ut et et. Incidunt itaque asperiores nemo est provident atque quod. Nulla tempore ex dolor aut est numquam nam. Beatae quibusdam et repudiandae vel distinctio voluptas suscipit.','https://via.placeholder.com/640x480.png/00eeff?text=articles+Article+placeat','2024-11-27 19:32:36','Travel','atque,veniam,nam',2,953,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(68,'Nemo enim laborum odit qui dolores.','In ea rerum et qui saepe autem quia. Inventore enim officia excepturi eos. Maiores voluptas repellat consectetur quo error quidem.\n\nEt dignissimos et nam. Quod quia dolor mollitia nam. Animi beatae qui aut fuga itaque. Aut voluptas adipisci excepturi illo recusandae officiis vel.\n\nSequi labore nisi quibusdam. Et debitis vel iure fuga adipisci corrupti modi. Autem vero aliquid et.','https://via.placeholder.com/640x480.png/0055aa?text=articles+Article+est','2024-08-23 01:02:31','Lifestyle','qui,quod,excepturi',2,537,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(69,'In ad officia cum similique.','Quas necessitatibus quia saepe minus quisquam debitis iure. Quis neque et quos voluptatem. Explicabo iure aut dignissimos quia excepturi quasi vel iste. Quo voluptas asperiores culpa atque et.\n\nDoloribus quia iure officiis laboriosam ut reiciendis nostrum. Est et facere laboriosam et. Minima esse sit impedit quae.\n\nRem optio beatae quidem nihil illo officiis. Ut illo id quia et corrupti. Neque sit ad vitae voluptas dolorem modi iste sint. Ut maxime odio sequi.','https://via.placeholder.com/640x480.png/002244?text=articles+Article+nobis','2024-06-13 01:27:41','Travel','non,est,cupiditate',2,217,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(70,'Alias ad animi dolor aliquam vel.','Quis quae placeat et dolor ut. Eum voluptatem velit eius. Quibusdam omnis eligendi sed rerum blanditiis.\n\nUt eos quos voluptatem eum vero corrupti. Et delectus autem vel natus beatae ab. Minus aliquam ipsa qui numquam.\n\nNulla dicta voluptate assumenda vel corrupti quo est. Vitae optio et repellat tempora dolores corrupti voluptatem.','https://via.placeholder.com/640x480.png/006677?text=articles+Article+est','2025-03-30 20:55:56','Travel','beatae,vel,velit',3,265,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(71,'Nihil eius repellendus facilis et.','Nostrum temporibus quam qui inventore vel enim corrupti assumenda. Impedit rerum et et illo commodi sint. Hic est voluptatem sit aliquid eaque. Sit perferendis amet velit et incidunt rerum esse.\n\nConsectetur et veritatis culpa sunt nemo tenetur qui. Aut fugit enim doloremque expedita saepe soluta nam voluptatum. Eaque eius voluptas assumenda doloremque omnis atque. Vero eos repudiandae iste magni omnis. Dicta qui et excepturi expedita voluptatem dolorem.\n\nSunt occaecati ea nihil quam voluptate. Qui quae harum est iste quo eos et unde. Placeat dolores est dolorem ut et neque. Earum natus et est.','https://via.placeholder.com/640x480.png/0088ff?text=articles+Article+odit','2024-06-14 02:22:38','Tech','neque,voluptas,possimus',2,456,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(72,'Facere architecto nihil ad et non nam laudantium.','Vero sed tempora voluptas facere aut aperiam voluptatem. Ea est dolorem fugiat enim praesentium molestiae ex sit. Provident voluptatem molestiae ut qui neque eius ut. Enim doloremque tempore id doloribus nemo rerum.\n\nVoluptatem rerum earum doloremque sit iure quaerat. Ratione quibusdam voluptatum delectus asperiores dolore voluptatem facilis. Enim voluptate voluptate omnis consequatur est natus aut. Voluptas assumenda soluta blanditiis beatae voluptas temporibus tempore.\n\nAb magni minima asperiores ut. Numquam fugiat quia architecto dolores dignissimos inventore id possimus. Voluptatum laboriosam cupiditate asperiores est dolor expedita. Ratione provident ut cupiditate et autem praesentium ut.','https://via.placeholder.com/640x480.png/0033cc?text=articles+Article+voluptatibus','2025-04-14 21:03:03','Travel','qui,consequatur,rerum',1,872,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(73,'Aliquam qui quod repellat recusandae explicabo officiis fugit.','Voluptas ullam qui in ut ratione. Consequuntur enim magni nihil voluptatem id ipsam. Quia totam error non cupiditate. A quia et rerum magni qui incidunt dolores velit.\n\nAdipisci quibusdam qui ab possimus. Inventore tempore laudantium quos non laborum minima. Voluptas ullam aperiam qui. Quo quae vel voluptatum est fugiat.\n\nDebitis suscipit dolorem ipsa soluta incidunt possimus. Aliquam tempore natus beatae aliquam ut earum. Expedita fugit accusantium libero enim eaque dolore sunt.','https://via.placeholder.com/640x480.png/00dd00?text=articles+Article+unde','2024-05-19 02:44:24','Finance','fugit,odio,delectus',3,419,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(74,'Dolorum consequatur est aliquid quis quia nesciunt dolor.','Saepe quaerat molestiae eos eum saepe iusto magnam quasi. Perferendis et maxime quia sint officiis repellendus sed.\n\nNisi eum aut ex eius quas voluptas similique. Voluptas et voluptates labore ut minima deserunt repellendus. Qui dolores possimus nisi reprehenderit illum delectus laboriosam. Occaecati in sed enim totam distinctio id officiis.\n\nAut numquam consequuntur rerum et reprehenderit voluptas. Odit ut ut vel nobis distinctio qui saepe. Non pariatur consequatur sed. Perferendis tempore ut atque vitae aperiam.','https://via.placeholder.com/640x480.png/00ddaa?text=articles+Article+necessitatibus','2025-03-20 19:56:12','Travel','sit,omnis,placeat',2,812,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(75,'Quia consequatur maiores non dignissimos eos quis.','Inventore sint vero quidem dolor voluptatem maxime iste. Aut aut cumque quo est voluptatibus neque sed. Explicabo cumque minus nesciunt cupiditate illum ut. Maiores libero itaque similique voluptatem dolorem ratione dolorum.\n\nAmet sequi ad voluptates nihil doloremque quae nemo. Et et veritatis et reprehenderit voluptatem maxime vel deleniti. Sed tempore numquam laboriosam assumenda voluptates. Quaerat id quia vero et.\n\nMolestiae nostrum doloribus ratione delectus. Mollitia qui quam enim aut sint. Molestiae aliquid placeat iste omnis. Maiores velit eos velit.','https://via.placeholder.com/640x480.png/0055bb?text=articles+Article+quod','2024-10-03 21:24:57','Finance','hic,ut,exercitationem',1,973,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(76,'Ea omnis rerum est ipsa architecto.','Quidem provident officiis qui ex impedit. Rerum asperiores commodi nihil qui ut atque. In sint assumenda velit cum voluptate. Iusto est vel cum recusandae.\n\nQuas porro porro officia. Consectetur molestiae minus recusandae nesciunt omnis. Qui veniam veniam accusamus. Earum magnam vero accusantium et.\n\nUt ut cupiditate autem ullam ut. Qui voluptates iure perspiciatis dolorem voluptatum autem veniam. Enim quisquam asperiores cupiditate reiciendis.','https://via.placeholder.com/640x480.png/00ffff?text=articles+Article+itaque','2024-10-13 12:48:40','Health','et,voluptatibus,voluptatem',3,592,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(77,'Autem illum voluptatum libero ipsa recusandae.','Blanditiis amet vero et et. Nisi incidunt quae sed qui quisquam. Qui ut eum quas error et eos.\n\nNon sint molestiae est ipsa perferendis id eum. Et quis sed ut sit autem dolor iure.\n\nTempora dolorum ratione iure rerum possimus. Recusandae officia ea pariatur quas eos nulla. Deserunt rem at dolor facere quis delectus.','https://via.placeholder.com/640x480.png/0011dd?text=articles+Article+ipsum','2025-01-31 23:32:40','Finance','voluptate,quia,provident',3,159,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(78,'Harum voluptatum quo a id magni ullam eligendi.','Placeat earum consequuntur illo dicta praesentium quo molestias. Commodi quas dolorem nam consequatur rerum. Corporis consequatur qui odio. Accusamus aperiam ut alias velit quibusdam aliquam. Eos et magnam numquam est ad iure voluptate consequatur.\n\nPraesentium sed et sunt explicabo omnis. Enim est occaecati ipsum. Debitis eum sed quas non velit dicta qui quibusdam. Quasi reprehenderit mollitia facere odit.\n\nMolestiae enim ullam fuga voluptatem non. Sed ab qui autem amet labore.','https://via.placeholder.com/640x480.png/008822?text=articles+Article+quia','2024-10-12 21:48:24','Lifestyle','corrupti,ut,nemo',3,614,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(79,'Ducimus quos qui et omnis.','Aut aut deserunt eveniet blanditiis et. Sed et consectetur ullam qui exercitationem. Quas iste et eos consequuntur debitis. Omnis cupiditate quaerat sunt sint. Consectetur a fugit laboriosam voluptates officiis.\n\nIste quis molestiae sapiente exercitationem inventore quia. Itaque dicta excepturi ut assumenda dignissimos. Dolore occaecati quia voluptate atque quae.\n\nNihil sunt odit voluptas nobis aspernatur vero placeat. Eveniet atque molestiae nulla doloremque sint. Eum ab molestias commodi eos. Voluptas quia qui officiis laboriosam assumenda dignissimos nihil.','https://via.placeholder.com/640x480.png/00ccbb?text=articles+Article+ratione','2025-03-11 22:11:22','Travel','sapiente,fuga,explicabo',3,78,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(80,'Eius enim quis alias fugiat quia ut consequatur.','Sint ut blanditiis velit. Consectetur tempora quo voluptas accusamus. Doloribus perferendis voluptatum laboriosam in ea ipsum error.\n\nNesciunt tempore perferendis consequatur fugiat. Consequatur ab recusandae provident sit minima pariatur laudantium. Ad quas vel omnis provident porro. Commodi consectetur ea iure enim officiis explicabo. Dolores ipsa dolore qui deleniti aliquid qui.\n\nPariatur quidem est reprehenderit dolor. Quibusdam deleniti aperiam sapiente repellendus minima ut molestiae. Ducimus facere maxime odit nemo error culpa facilis qui. Qui qui expedita quidem autem facilis et. Non dolor at qui iure vel ipsam officia.','https://via.placeholder.com/640x480.png/002222?text=articles+Article+eius','2024-06-10 14:52:47','Finance','et,modi,officia',3,461,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(81,'Laborum ratione laboriosam animi corporis et quo.','Provident voluptates molestias eos voluptatem. Iusto explicabo atque delectus dicta ratione et perspiciatis id. Earum provident tempore voluptatem soluta velit repellendus. Voluptatem et non omnis earum.\n\nNumquam laudantium et consectetur debitis rerum. Sed alias quisquam enim perferendis sit. Quidem ipsum animi dolor.\n\nDeserunt vitae autem sed omnis vel. Quas rerum maxime perspiciatis nemo. Commodi amet impedit ullam ipsa. Quam laboriosam voluptas delectus et neque.','https://via.placeholder.com/640x480.png/0055ee?text=articles+Article+voluptatum','2025-03-13 10:39:46','Tech','praesentium,possimus,et',3,193,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(82,'Itaque in nesciunt est aut qui nihil doloribus id.','Minima amet officiis voluptatibus voluptates rerum iusto dolores. Aliquam qui et eos laboriosam possimus. Fugit doloribus et cupiditate sit unde quis aut.\n\nEt quia vel cumque dolorem consequatur nulla. Blanditiis labore molestias qui non porro eius. Ullam eligendi iusto quia nostrum non.\n\nFugit est veniam mollitia quis ab voluptas illo asperiores. Nam et reprehenderit repellat hic quaerat qui repudiandae nam. Dignissimos atque voluptas ut doloremque explicabo.','https://via.placeholder.com/640x480.png/007788?text=articles+Article+accusamus','2024-10-29 18:22:48','Tech','voluptates,voluptatem,ut',3,109,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(83,'Libero libero asperiores perferendis distinctio consequatur dolor qui adipisci.','Non sed vitae deleniti earum. Quae perspiciatis consectetur vero dolores. Ipsam accusantium quam culpa pariatur voluptas sunt. Perspiciatis assumenda non commodi quod.\n\nEligendi beatae et omnis et qui quo. Dolor est earum consequatur non rerum quas voluptatem. Eum sed incidunt asperiores sint. Accusamus esse nemo praesentium similique quaerat voluptatibus tempore.\n\nQuod sint eaque quasi et laborum provident. Dolores enim dolor tenetur perferendis et neque qui. Earum incidunt libero quis mollitia. Nobis doloremque quia qui ea amet totam. Debitis fuga praesentium placeat totam repudiandae.','https://via.placeholder.com/640x480.png/00ee33?text=articles+Article+deleniti','2024-06-28 04:01:45','Health','nihil,sint,consequatur',3,133,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(84,'Odit soluta fugiat eius voluptas quo id rerum.','Sit aliquid quis blanditiis esse. Dignissimos harum ipsa nemo rerum et nihil eos consequuntur. Velit cupiditate magnam aut voluptate magnam. Reiciendis quasi ut velit hic.\n\nRatione vero qui velit recusandae accusamus. Quae ut consequatur eum qui. Eaque ut error ut dolores consequatur voluptates. Repudiandae sed voluptatibus ut ad consequatur asperiores asperiores. Itaque impedit id ullam et aspernatur ut laborum cum.\n\nEx veniam eum dolorem totam corrupti. Quidem sed accusantium possimus inventore quis. Perspiciatis quam enim dolores cum. Consectetur repellendus labore ea suscipit fugit.','https://via.placeholder.com/640x480.png/008800?text=articles+Article+maxime','2024-11-21 03:21:44','Health','delectus,omnis,eos',1,120,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(85,'Provident ratione mollitia asperiores ea magni.','Iure harum laboriosam ratione quo eos recusandae aliquid. Et iste odit vitae sint voluptatem. A ratione odit nobis qui repellat dolorem.\n\nPariatur corporis impedit perferendis quos voluptas eius quo. Officia qui nisi velit enim. Veniam voluptatem quo sit et voluptatibus.\n\nSit doloremque voluptatum unde dolorum eos. Eveniet corporis natus soluta cupiditate.','https://via.placeholder.com/640x480.png/006600?text=articles+Article+hic','2024-12-05 06:07:13','Travel','itaque,placeat,itaque',1,363,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(86,'Fugiat qui saepe nostrum maxime.','Voluptatem minus qui perspiciatis porro assumenda sunt suscipit. Vel omnis voluptatem maiores commodi fuga culpa aliquid tempore. Aspernatur reiciendis recusandae officia aut nobis saepe. Odit nobis unde voluptas sed iusto qui.\n\nNobis in impedit voluptas natus quia incidunt qui. Hic maxime dolore molestias. Aspernatur aut est aut odio aperiam quibusdam.\n\nEst qui saepe cum quia rerum veritatis perferendis reiciendis. Labore atque qui laboriosam quibusdam et consequatur voluptatum. Temporibus in vitae eos et.','https://via.placeholder.com/640x480.png/00bb66?text=articles+Article+autem','2025-02-23 15:06:58','Travel','voluptas,rem,exercitationem',1,772,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(87,'Molestiae tempore corrupti et ut qui accusamus.','Rerum ducimus libero voluptates perspiciatis atque molestiae consequuntur in. Omnis voluptatibus non voluptatem et expedita iusto enim. Maiores perferendis dolores et.\n\nCupiditate accusantium ut dignissimos placeat. Aliquam dolores eum ullam et. Deleniti et et aliquam quod sint. Et saepe assumenda excepturi quasi est sunt aut.\n\nAb eum quam placeat ea quasi. Numquam odit et eaque voluptatem rem aspernatur.','https://via.placeholder.com/640x480.png/002222?text=articles+Article+debitis','2024-08-27 09:22:18','Travel','et,magni,rem',2,540,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(88,'Ullam ipsam odit dolores dolorem qui.','Harum culpa enim eos aperiam. Nesciunt et libero ut voluptatem minus odio. Officia quod cumque dolores et corporis voluptatem.\n\nQuas sed et molestias corrupti ipsam vero. Porro nihil nemo at deserunt ex cupiditate. Velit suscipit nihil perferendis dolores ut nesciunt labore maiores. Alias iste dolorum dolorem suscipit expedita est iure.\n\nAut officiis molestias enim soluta nam beatae maxime. Autem tempore quisquam aut voluptas possimus molestiae omnis tempora. Impedit sunt explicabo quis.','https://via.placeholder.com/640x480.png/004466?text=articles+Article+velit','2024-10-26 11:02:40','Travel','soluta,omnis,molestiae',1,737,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(89,'Tempore adipisci ad perferendis similique amet quibusdam.','Quibusdam illo molestias aut. Voluptatem officia incidunt culpa atque dolorem sit ipsa. Vero nesciunt eum dolor. Quae incidunt modi ducimus alias qui alias.\n\nQui sint in excepturi. Mollitia assumenda omnis voluptatem accusantium. Commodi qui sed minima et.\n\nCupiditate vero voluptatibus nostrum suscipit quibusdam repudiandae. Tenetur numquam qui suscipit explicabo iste consectetur est similique.','https://via.placeholder.com/640x480.png/0033ff?text=articles+Article+facilis','2024-07-12 04:42:58','Travel','repudiandae,error,quo',3,994,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(90,'Tempora voluptas magnam quasi dolore quia deleniti.','Ratione fugiat ipsum quos quos id nulla ut odit. Animi tempore quisquam laudantium nisi. Facilis magnam asperiores cumque est velit. Qui vel voluptas qui sint maxime aut ab iure.\n\nUt dolorum rerum illo nam magnam. Cumque nihil aliquam officia voluptatem magnam. Architecto et et ipsum.\n\nNon est occaecati consequatur distinctio atque soluta explicabo. Aliquam ea voluptatem autem saepe vel. Culpa ut consequatur ipsam quo sed a quae dolor. In distinctio distinctio eos magni.','https://via.placeholder.com/640x480.png/00aa88?text=articles+Article+incidunt','2025-01-05 04:33:50','Health','rerum,eius,magni',1,470,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(91,'Magnam optio aspernatur praesentium est dicta ipsum magni.','Voluptate doloremque voluptatibus voluptate ut. Voluptas vel suscipit soluta explicabo eum ut officia voluptates. Nihil magni totam laudantium enim impedit. Laudantium ducimus odit aliquid cum facere dolores.\n\nQuia aut consequatur et aut eius laudantium in molestias. Dolor rem quas minus rem. Ad fugit omnis necessitatibus excepturi quae nesciunt.\n\nNon pariatur molestiae consequatur iure ipsum dolorem in. Eaque ex optio repellendus.','https://via.placeholder.com/640x480.png/00aa22?text=articles+Article+deleniti','2024-05-27 01:06:02','Travel','sunt,veritatis,ullam',3,279,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(92,'Voluptas quia eaque voluptas blanditiis enim.','Eum quidem aut corporis vel consequuntur. Eum placeat voluptatibus nulla quaerat ut. Sit exercitationem debitis voluptate nostrum.\n\nNon ipsam quos qui ad velit. Aperiam aut laboriosam accusantium dolores libero. Atque nesciunt et qui earum accusantium hic.\n\nRatione ut quia sit. Architecto est saepe et illum alias vero. Quae qui impedit qui.','https://via.placeholder.com/640x480.png/001111?text=articles+Article+amet','2024-05-02 02:34:19','Tech','eum,soluta,dolor',3,925,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(93,'Dolor qui vitae blanditiis vitae eius dolor.','Quibusdam impedit magnam et voluptatum consectetur aliquam quod. Iure et asperiores nemo non occaecati. Ea eveniet praesentium ratione distinctio explicabo aliquid iste. Hic sequi quibusdam eos sed nam.\n\nAdipisci sint vitae quisquam est et sint. Doloribus nostrum magnam officiis ut.\n\nPossimus doloremque quam et maiores aut. Excepturi ab tenetur voluptate beatae sit. Vitae illum saepe odit est eveniet fugiat nihil itaque.','https://via.placeholder.com/640x480.png/0077ee?text=articles+Article+nisi','2024-09-09 18:02:35','Health','voluptates,hic,assumenda',3,316,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(94,'Provident occaecati repellendus molestias voluptas culpa.','Vitae dolorum cum numquam dignissimos doloremque voluptatibus voluptatum non. Eum harum tempora alias soluta ducimus aut assumenda. Porro a ea recusandae dolorum architecto id.\n\nSed assumenda consequatur aut. Quasi et error enim eum est qui. Iste sed accusamus est culpa deserunt nisi. Quia et odio architecto molestiae modi id eveniet.\n\nEst aut ipsa ipsum quia sit. Quia commodi maxime reprehenderit quidem. Aliquam et consequuntur quos fuga ducimus non. Et qui labore mollitia atque doloribus ducimus aut.','https://via.placeholder.com/640x480.png/00eeaa?text=articles+Article+unde','2024-05-06 13:11:12','Travel','voluptatem,deserunt,sed',3,86,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(95,'Voluptas perferendis possimus libero quo quas.','Error distinctio expedita modi id. Quo magnam quis deserunt eius qui. Incidunt eum sunt et. Aut non debitis unde.\n\nDebitis perspiciatis et minima laborum aliquam consequatur exercitationem aut. Sapiente et id voluptatem assumenda.\n\nVelit eligendi aut aliquam quisquam hic. Magnam at qui magnam ab dolorem deleniti. Quisquam amet magni sunt consectetur sit. Fuga quod praesentium omnis qui ullam.','https://via.placeholder.com/640x480.png/00ff77?text=articles+Article+blanditiis','2024-08-16 15:52:16','Travel','rerum,et,sint',1,883,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(96,'Id ut autem cumque expedita sit et cupiditate.','Quidem et et inventore et voluptatem placeat recusandae est. Dicta beatae dolores consequatur doloribus reiciendis. Voluptatibus vel itaque consequuntur aliquid qui et accusamus.\n\nEt non asperiores neque perferendis tenetur voluptatem aut. Odit excepturi deserunt unde dolores pariatur occaecati suscipit.\n\nAsperiores vitae fuga qui enim temporibus soluta voluptatem a. Fugit eos quo nulla ullam. Vero necessitatibus quaerat cupiditate rerum ipsa. Assumenda totam labore ut in nihil vel ut nulla.','https://via.placeholder.com/640x480.png/0077cc?text=articles+Article+et','2024-12-08 02:00:41','Lifestyle','dolorem,inventore,omnis',1,904,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(97,'Iste quia possimus quaerat minus maiores.','Nostrum magnam ducimus nam alias. Voluptatum voluptatibus reiciendis incidunt illo et. Aut quidem et laborum est voluptate blanditiis. Fugiat similique ut accusantium pariatur est voluptatum. Rerum et perferendis eligendi iusto earum.\n\nAliquid ipsam quam velit tempore. Consequatur nesciunt omnis reiciendis. Quis dolore velit ratione eos est minima exercitationem. Esse eius saepe velit numquam.\n\nVoluptatem qui est veniam magni. Facere ex accusantium maxime sed incidunt praesentium. Omnis et blanditiis et sed voluptas.','https://via.placeholder.com/640x480.png/003300?text=articles+Article+eum','2024-09-27 20:00:47','Lifestyle','voluptate,odio,harum',2,169,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(98,'Iste est ut sint non quibusdam quis.','Adipisci voluptates ipsam reiciendis quia autem reiciendis iusto. Sint fugiat quo voluptas quisquam. Aut nobis odit molestias ut atque eligendi.\n\nPorro quia dolores reiciendis quo eos et. Rerum quos facilis tempora eaque in iure. Aut nulla omnis similique dolore qui.\n\nDolores reiciendis hic asperiores eos deleniti voluptas omnis. Beatae aut architecto molestiae quod unde. Eos deserunt quam quidem et eos ratione deleniti.','https://via.placeholder.com/640x480.png/00cc11?text=articles+Article+animi','2024-10-05 02:31:28','Finance','mollitia,et,dolor',2,66,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(99,'Ullam pariatur occaecati nihil velit.','Atque doloremque aliquam deleniti accusamus aut consectetur laboriosam. Rerum natus voluptate ea est veritatis. Distinctio voluptatem consequatur nobis consequatur modi suscipit. Voluptas consequuntur aut accusantium pariatur nesciunt ratione iure.\n\nNemo molestiae nulla minus aut rem nam. Veniam ut sed iure sapiente. A et error et delectus voluptatem nihil. Porro earum labore ducimus omnis laboriosam. Eius dolor quos ut voluptatem et nulla incidunt ipsam.\n\nAd expedita deleniti atque voluptates quisquam eos qui voluptas. Quibusdam nisi quos autem reprehenderit et laboriosam velit. Numquam sint adipisci reprehenderit qui est rerum.','https://via.placeholder.com/640x480.png/006644?text=articles+Article+sed','2024-09-23 09:23:07','Travel','perferendis,neque,eos',1,669,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(100,'Accusantium amet cum distinctio hic libero eius.','Dignissimos nostrum voluptas provident quia voluptatem natus voluptatem voluptas. Quia ab omnis ut qui doloribus impedit impedit. Saepe vero quidem a dolor voluptas quos harum aliquid.\n\nEx nostrum recusandae perferendis impedit. Temporibus natus qui nesciunt laudantium nam.\n\nNon velit eveniet nihil qui qui deleniti beatae. Error enim a laboriosam. Voluptas velit asperiores laudantium est.','https://via.placeholder.com/640x480.png/0088aa?text=articles+Article+asperiores','2024-07-01 06:56:42','Health','dolorem,quia,culpa',1,520,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(101,'Qui architecto perferendis perferendis deleniti.','Qui necessitatibus temporibus qui tenetur dolorem tempore aperiam aut. Sit aut aut at iure rem est iure.\n\nDignissimos et et magni ratione. Consequuntur sint tempore qui doloremque et necessitatibus. Quasi voluptatibus a nesciunt adipisci neque. Cupiditate velit incidunt voluptatibus atque sit.\n\nMinus iusto porro ipsum sit autem asperiores tempore. A vitae quasi eum eveniet est. Voluptate placeat voluptates expedita consequatur asperiores nobis et.','https://via.placeholder.com/640x480.png/00bbee?text=articles+Article+nobis','2025-02-25 19:27:27','Travel','omnis,earum,iste',3,915,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(102,'Rerum est tempore quibusdam omnis.','Cumque adipisci eum ut consequatur vitae commodi officiis. Temporibus ea exercitationem dicta voluptas accusantium. Id sit debitis repellat et at quaerat amet tempora. Quaerat qui facilis velit commodi.\n\nAd id ut recusandae assumenda. Ut numquam cupiditate similique in sed illo qui. Quis iusto asperiores corrupti. Molestiae possimus suscipit non et tenetur.\n\nAb molestiae voluptatem voluptas corrupti aut maxime voluptate. Odio tenetur expedita id delectus. Temporibus sit voluptatem quibusdam tenetur vel est. At autem et illum porro debitis.','https://via.placeholder.com/640x480.png/00eeaa?text=articles+Article+molestiae','2024-09-16 17:07:07','Lifestyle','libero,enim,cupiditate',2,448,'2025-04-24 14:47:29','2025-04-24 14:47:29'),(103,'Iure nobis qui molestias placeat veritatis.','Corporis a vel commodi et quas voluptatem. Sequi aliquid modi quod ut error ut consequatur. Suscipit illo dicta ut optio cum nulla laudantium. Quidem soluta non sit repellendus.\n\nAmet eveniet quia et deserunt asperiores. Placeat beatae repellendus enim quia ut.\n\nLaboriosam et commodi delectus magni et. Inventore velit in cumque omnis nesciunt molestiae dolor. Molestiae quia ut quas aut omnis iure.','https://via.placeholder.com/640x480.png/009977?text=articles+Article+est','2024-08-31 03:31:06','Tech','eaque,dolores,possimus',3,863,'2025-04-24 14:47:29','2025-04-24 14:47:29');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('admin@email.com|127.0.0.1','i:1;',1745506448),('admin@email.com|127.0.0.1:timer','i:1745506448;',1745506448);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `CategoryID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Paket Franchise','2024-12-17 07:53:13','2024-12-17 07:53:15'),(2,'Hasil Jadi','2024-12-17 07:53:25','2024-12-17 07:53:26');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (8,'2024_09_05_081856_create_orders_table',2),(15,'2024_11_21_060308_create_pembayaran_table',3),(22,'2024_12_08_162735_add_status_to_pembayaran_table',5),(55,'0001_01_01_000000_create_users_table',6),(56,'0001_01_01_000001_create_cache_table',6),(57,'0001_01_01_000002_create_admins_table',6),(58,'2024_09_05_080930_create_peta_franchise_table',6),(59,'2024_09_05_080931_create_mitra_table',6),(60,'2024_09_05_080932_create_calon_mitra_table',6),(61,'2024_09_05_080934_create_categories_table',6),(62,'2024_09_05_081857_create_invoices_table',6),(63,'2024_09_05_082431_create_articles_table',6),(64,'2024_09_05_082614_create_products_table',6),(65,'2024_09_05_082742_create_order_details_table',6),(66,'2024_09_05_083146_create_sales_reports_table',6),(67,'2024_11_16_151358_add_columns_to_calon_mitra_table',6),(68,'2024_12_08_144912_create_pembayaran_table',6),(69,'2024_12_09_032046_add_status_to_pembayaran_table',6),(70,'2024_12_09_034101_add_status_to_pembayaran_table',7),(71,'2024_12_09_041952_create_orders_table',8),(72,'2024_12_09_050909_update_total_column_in_orders_table',9),(73,'2024_12_09_061137_create_orders_table',10),(74,'2024_12_09_061814_create_orders_table',11),(75,'2024_12_09_061924_update_total_column_in_orders_table',12),(76,'2024_12_10_073842_add_tanggal_to_orders_table',13),(77,'2024_12_10_074426_modify_tanggal_nullable_in_orders_table',14),(81,'2024_12_10_111047_add_payment_id_to_orders_table',15),(87,'2024_12_05_073424_add_status_to_products_table',16),(88,'2024_12_10_123543_add_nomor_to_mitra_table',16),(89,'2024_12_11_061458_create_pembayaran_produk_table',16),(90,'2024_12_11_070248_update_pembayaran_produk_table',16),(91,'2024_12_16_073424_add_product_image_to_products_table',16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mitra`
--

DROP TABLE IF EXISTS `mitra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mitra` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_mitra` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ktp` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `domisili` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan_mitra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pos` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_ktp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `catatan_approver` text COLLATE utf8mb4_unicode_ci,
  `status` enum('belum diproses','diterima','ditolak') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum diproses',
  `kategori` enum('mitra','non-mitra') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mitra',
  `aktif` enum('aktif','non-aktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mitra`
--

LOCK TABLES `mitra` WRITE;
/*!40000 ALTER TABLE `mitra` DISABLE KEYS */;
INSERT INTO `mitra` VALUES (1,'JAK001','Dadang Suradang Awa','468','2025-01-21','your.email+fakedata10162@gmail.com','414-186-8544','Laki-laki','Iste libero expedita quod doloribus officia.','Magni dolorem similique saepe cumque nisi dolorum.','Repellendus dolorem cum quasi adipisci modi suscipit eum.','DKI Jakarta','Jakarta Selatan','Kebayoran Baru','Selong','DKI Jakarta','Jakarta Selatan','Kebayoran Baru','Selong','04885','-6.262528','106.736737','ktp/Bw0XCJem0OeHhMkCOvaRtbr7l5i5XIAI9VpfijOj.png','foto/yPHMN73mNE03HSQvoeNRgCDY3UDWFHjuR8Z0OShF.png',NULL,'ditolak','mitra','aktif','2025-01-12 07:34:47','2025-04-15 09:33:16'),(2,'JAK002','Dolor Sit','336','2026-01-31','your.email+fakedata94249@gmail.com','248-750-2463','Wanita','Recusandae omnis nam.','Accusantium doloremque asperiores error odio.','Reiciendis iure animi laboriosam aliquam iusto at quibusdam voluptates ipsum.','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','79749-1037','-6.397112','106.907586','ktp/5HFAbzAxAwUqxNhNOYV3vH7KOH99KXjgq5TKYqWO.png','foto/odgcrpBSBpmMvcXUGkfwwypeEM6ahE6u3L7F34mk.png',NULL,'ditolak','mitra','non-aktif','2025-02-12 07:35:34','2025-04-15 09:33:22'),(3,'JAK003','Amet Nur','276','2025-09-03','your.email+fakedata20740@gmail.com','223-610-2931','Laki-laki','Suscipit iusto ad qui assumenda laboriosam maxime.','Modi aut nihil a praesentium sed.','Eligendi facilis unde ea animi.','DKI Jakarta','Jakarta Pusat','Menteng','Menteng','DKI Jakarta','Jakarta Pusat','Menteng','Menteng','26964-6365','-6.262528','106.736737','ktp/4w2TvyFBbTHYXwCeuOVqsSqI4jdWLAn2hnBr2xq5.png','foto/WJbi4TjeROx1lHQLQPxhohPf0GNF4mT9maYz7p82.png',NULL,'diterima','mitra','aktif','2025-03-14 07:38:48','2025-04-15 09:36:12'),(4,'JAK004','Jane Doe','521','2024-12-28','your.email+fakedata21544@gmail.com','094-562-0592','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','DKI Jakarta','Jakarta Utara','Kelapa Gading','Kelapa Gading Timur','15764','-6.397112','106.736737','ktp/qNMQyKH5U9Ahn5PWSYiIwlfSqU1pssZnUhceY3A9.png','foto/YI6ATbln5P4q9sLtYbvv9az4orCr0Ol5rSdMLksK.jpg','gerobak lu jelekkkk','belum diproses','mitra','aktif','2025-03-14 07:38:25','2025-04-14 13:37:10'),(5,'JAK005','Dean Tristan','521','2024-07-27','your.email+fakedata77801@gmail.com','406-611-6265','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Pusat','Menteng','Kebon Sirih','DKI Jakarta','Jakarta Pusat','Menteng','Kebon Sirih','52779-4819','-6.262528','106.907586','ktp/OklfpzE50AJtc2Xv5rfdXjNxGyIc5sCRSB8U9ALz.jpg','foto/7xW03NPvTy0REAdAopRbaV0MguYGcWNcJExrdimQ.jpg','gerobak lu jelekkkk','belum diproses','mitra','aktif','2025-04-14 07:38:48','2025-04-14 13:38:03'),(6,'JAK006','Epon Gimang','521','2025-11-05','your.email+fakedata46217@gmail.com','714-378-5288','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Pusat','Menteng','Gondangdia','DKI Jakarta','Jakarta Pusat','Menteng','Gondangdia','82112-4351','-6.277063','106.732577','ktp/n4rWxAQtseBeIY8cQU5kbbj9m2vTGyie0rScRAhV.jpg','foto/lnTF96VZd4XCTwYk1Fjg1wpfgYno4gtMc0HBMl9q.jpg','gerobak lu jelekkkk','belum diproses','mitra','aktif','2025-04-14 07:38:48','2025-04-14 13:38:24'),(7,'JAK007','Devi Februari','521','2025-11-05','your.email+fakedata46217@gmail.com','714-378-5288','Laki-laki','340 Ara Route','340 Ara Route','Portage','DKI Jakarta','Jakarta Utara','Tanjung Priok','Sungai Bambu','DKI Jakarta','Jakarta Utara','Tanjung Priok','Sungai Bambu','82112-4351','-6.277063','106.732577','ktp/LpZimgd5zUslFvG9QjKMMSUkxdS9rrVvuW8opDBt.jpg','foto/HAv6OKfW2UMXxPqms8X1OoYRkMhBOkB5QHTPX6nS.jpg',NULL,'belum diproses','mitra','aktif','2025-04-14 07:38:48','2025-04-14 07:39:35');
/*!40000 ALTER TABLE `mitra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `payment_id` bigint unsigned DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('mitra','non mitra') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `pickup_method` enum('delivery','pickup') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('menunggu','sudah diambil') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mitra_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_id_unique` (`order_id`),
  KEY `orders_payment_id_foreign` (`payment_id`),
  CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (131,'DEM1','2025-01-04',NULL,'Pelanggan 1 - 1','non mitra',107777.00,'delivery','menunggu','2025-01-04 18:49:59','2025-01-04 18:49:59',7),(132,'DEM132','2025-01-24',NULL,'Pelanggan 2 - 1','non mitra',250097.00,'delivery','menunggu','2025-01-24 03:18:58','2025-01-24 03:18:58',1),(133,'DEM133','2025-01-01',NULL,'Pelanggan 3 - 1','mitra',489149.00,'pickup','sudah diambil','2025-01-01 23:13:09','2025-01-01 23:13:09',6),(134,'DEM134','2025-01-08',NULL,'Pelanggan 4 - 1','non mitra',384339.00,'delivery','menunggu','2025-01-08 12:38:47','2025-01-08 12:38:47',2),(135,'DEM135','2025-01-16',NULL,'Pelanggan 5 - 1','mitra',199514.00,'pickup','menunggu','2025-01-16 15:40:31','2025-01-16 15:40:31',6),(136,'DEM136','2025-01-18',NULL,'Pelanggan 6 - 1','mitra',300303.00,'delivery','menunggu','2025-01-18 14:20:44','2025-01-18 14:20:44',3),(137,'DEM137','2025-01-21',NULL,'Pelanggan 7 - 1','mitra',401938.00,'delivery','menunggu','2025-01-21 12:58:09','2025-01-21 12:58:09',5),(138,'DEM138','2025-01-14',NULL,'Pelanggan 8 - 1','non mitra',391552.00,'pickup','sudah diambil','2025-01-14 10:08:43','2025-01-14 10:08:43',1),(139,'DEM139','2025-01-21',NULL,'Pelanggan 9 - 1','non mitra',242268.00,'pickup','menunggu','2025-01-21 21:55:38','2025-01-21 21:55:38',3),(140,'DEM140','2025-01-28',NULL,'Pelanggan 10 - 1','mitra',429742.00,'delivery','menunggu','2025-01-28 22:15:01','2025-01-28 22:15:01',6),(141,'DEM141','2025-02-03',NULL,'Pelanggan 1 - 2','mitra',342186.00,'pickup','sudah diambil','2025-02-03 06:32:43','2025-02-03 06:32:43',7),(142,'DEM142','2025-02-17',NULL,'Pelanggan 2 - 2','non mitra',291604.00,'delivery','menunggu','2025-02-17 15:15:10','2025-02-17 15:15:10',2),(143,'DEM143','2025-02-09',NULL,'Pelanggan 3 - 2','mitra',246299.00,'pickup','sudah diambil','2025-02-09 22:57:58','2025-02-09 22:57:58',4),(144,'DEM144','2025-02-26',NULL,'Pelanggan 4 - 2','non mitra',259153.00,'delivery','menunggu','2025-02-26 20:52:05','2025-02-26 20:52:05',2),(145,'DEM145','2025-02-07',NULL,'Pelanggan 5 - 2','mitra',402818.00,'pickup','sudah diambil','2025-02-07 16:10:15','2025-02-07 16:10:15',1),(146,'DEM146','2025-02-02',NULL,'Pelanggan 6 - 2','non mitra',142783.00,'delivery','sudah diambil','2025-02-02 16:03:49','2025-02-02 16:03:49',3),(147,'DEM147','2025-02-21',NULL,'Pelanggan 7 - 2','mitra',113798.00,'delivery','menunggu','2025-02-21 11:40:18','2025-02-21 11:40:18',7),(148,'DEM148','2025-02-28',NULL,'Pelanggan 8 - 2','mitra',400735.00,'delivery','menunggu','2025-02-28 09:13:50','2025-02-28 09:13:50',5),(149,'DEM149','2025-02-23',NULL,'Pelanggan 9 - 2','mitra',257877.00,'delivery','sudah diambil','2025-02-23 14:44:23','2025-02-23 14:44:23',4),(150,'DEM150','2025-02-17',NULL,'Pelanggan 10 - 2','non mitra',314461.00,'delivery','sudah diambil','2025-02-17 19:55:03','2025-02-17 19:55:03',7),(151,'DEM151','2025-03-11',NULL,'Pelanggan 1 - 3','non mitra',423250.00,'pickup','menunggu','2025-03-11 07:07:48','2025-03-11 07:07:48',2),(152,'DEM152','2025-03-22',NULL,'Pelanggan 2 - 3','non mitra',318149.00,'delivery','sudah diambil','2025-03-22 03:19:17','2025-03-22 03:19:17',3),(153,'DEM153','2025-03-23',NULL,'Pelanggan 3 - 3','non mitra',448358.00,'pickup','menunggu','2025-03-23 13:11:41','2025-03-23 13:11:41',1),(154,'DEM154','2025-03-11',NULL,'Pelanggan 4 - 3','mitra',251269.00,'delivery','sudah diambil','2025-03-11 12:43:30','2025-03-11 12:43:30',4),(155,'DEM155','2025-03-13',NULL,'Pelanggan 5 - 3','mitra',370482.00,'pickup','menunggu','2025-03-13 07:33:24','2025-03-13 07:33:24',6),(156,'DEM156','2025-03-24',NULL,'Pelanggan 6 - 3','non mitra',227136.00,'delivery','menunggu','2025-03-24 11:31:12','2025-03-24 11:31:12',5),(157,'DEM157','2025-03-29',NULL,'Pelanggan 7 - 3','mitra',106966.00,'delivery','sudah diambil','2025-03-29 14:52:16','2025-03-29 14:52:16',6),(158,'DEM158','2025-03-01',NULL,'Pelanggan 8 - 3','non mitra',413356.00,'pickup','sudah diambil','2025-03-01 03:10:54','2025-03-01 03:10:54',4),(159,'DEM159','2025-03-08',NULL,'Pelanggan 9 - 3','mitra',469029.00,'pickup','menunggu','2025-03-08 00:24:11','2025-03-08 00:24:11',7),(160,'DEM160','2025-03-09',NULL,'Pelanggan 10 - 3','mitra',460969.00,'pickup','menunggu','2025-03-09 17:26:35','2025-03-09 17:26:35',7),(161,'DEM161','2025-04-26',NULL,'Pelanggan 1 - 4','non mitra',236658.00,'delivery','menunggu','2025-04-26 10:38:40','2025-04-26 10:38:40',5),(162,'DEM162','2025-04-28',NULL,'Pelanggan 2 - 4','non mitra',308032.00,'pickup','sudah diambil','2025-04-28 01:52:04','2025-04-28 01:52:04',3),(163,'DEM163','2025-04-25',NULL,'Pelanggan 3 - 4','mitra',387107.00,'delivery','menunggu','2025-04-25 12:04:34','2025-04-25 12:04:34',1),(164,'DEM164','2025-04-20',NULL,'Pelanggan 4 - 4','non mitra',100310.00,'pickup','menunggu','2025-04-20 07:49:37','2025-04-20 07:49:37',7),(165,'DEM165','2025-04-25',NULL,'Pelanggan 5 - 4','non mitra',273882.00,'delivery','sudah diambil','2025-04-25 07:38:45','2025-04-25 07:38:45',6),(166,'DEM166','2025-04-06',NULL,'Pelanggan 6 - 4','non mitra',480986.00,'delivery','menunggu','2025-04-06 00:56:41','2025-04-06 00:56:41',7),(167,'DEM167','2025-04-01',NULL,'Pelanggan 7 - 4','non mitra',475519.00,'pickup','menunggu','2025-04-01 03:05:44','2025-04-01 03:05:44',3),(168,'DEM168','2025-04-23',NULL,'Pelanggan 8 - 4','non mitra',212116.00,'pickup','menunggu','2025-04-23 21:11:40','2025-04-23 21:11:40',5),(169,'DEM169','2025-04-07',NULL,'Pelanggan 9 - 4','non mitra',329620.00,'pickup','menunggu','2025-04-07 19:09:38','2025-04-07 19:09:38',1),(170,'DEM170','2025-04-21',NULL,'Pelanggan 10 - 4','mitra',163174.00,'pickup','sudah diambil','2025-04-21 16:47:57','2025-04-21 16:47:57',3);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_delivery` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_bukti` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('pending','approved','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (20,'Devi Fedrianingsih','Jl. Cipinang Lontar 1 No. 25','Jakarta Timur','13240','081918999460','bca','delivery','21000000','bukti-transfers/IOBnrlywSCwnFNtHjdUK0PHHRBSrAI7uYadTKKYu.jpg','2025-03-13 06:27:05','2025-03-13 06:27:25','approved');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran_produk`
--

DROP TABLE IF EXISTS `pembayaran_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran_produk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pembayaran_id` bigint unsigned NOT NULL,
  `nama_produk` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_produk` int NOT NULL,
  `kuantitas` int NOT NULL,
  `total_harga` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pembayaran_produk_pembayaran_id_foreign` (`pembayaran_id`),
  CONSTRAINT `pembayaran_produk_pembayaran_id_foreign` FOREIGN KEY (`pembayaran_id`) REFERENCES `pembayaran` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran_produk`
--

LOCK TABLES `pembayaran_produk` WRITE;
/*!40000 ALTER TABLE `pembayaran_produk` DISABLE KEYS */;
INSERT INTO `pembayaran_produk` VALUES (1,20,'Paket Hemat B',12000000,1,12000000.00,'2025-03-13 06:27:05','2025-03-13 06:27:05'),(2,20,'Paket Super C',9000000,1,9000000.00,'2025-03-13 06:27:05','2025-03-13 06:27:05');
/*!40000 ALTER TABLE `pembayaran_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ProductID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProductDescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Price` double DEFAULT NULL,
  `Stock` int DEFAULT NULL,
  `ProductRating` double DEFAULT NULL,
  `CategoryID` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `ProductImage` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `products_categoryid_foreign` (`CategoryID`),
  CONSTRAINT `products_categoryid_foreign` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Telur Puyuh Rebus','Telur Puyuh Rebus',4000,3000,NULL,2,'2024-12-17 01:20:51','2024-12-17 01:20:51','published','img/product_image/6761346392fff.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_reports`
--

DROP TABLE IF EXISTS `sales_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_reports` (
  `ReportID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ReportDate` date DEFAULT NULL,
  `TotalSales` double DEFAULT NULL,
  `AdminID` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ReportID`),
  KEY `sales_reports_adminid_foreign` (`AdminID`),
  CONSTRAINT `sales_reports_adminid_foreign` FOREIGN KEY (`AdminID`) REFERENCES `admins` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_reports`
--

LOCK TABLES `sales_reports` WRITE;
/*!40000 ALTER TABLE `sales_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('uIgIgy3poDsnF0oe3Zx3Ygae5JoR2gpjyjzF00p4',3,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoidGoweTl5dlNrVlVscW9pMkp0U0NWQkg5am9CMDV6SmNzVnNxU1ZuZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTc0NTUwNjM5Mzt9fQ==',1745506565),('xNjkVf8kHFtCemo3mY4qU0J1cHoQWiohGPEvadXp',3,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRmxGT25QOGVTSkFSeE5RWGlETUVrNVE5QXNheVVmZ2tXa1FjN3ZzOCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NDU1MDY1OTI7fX0=',1745508873);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com',NULL,'$2y$12$kFrIJoo9dsvbowDC9t3ck.W61Vpkx9wrVOXe8Ehc2UsC2lNAG0FVi',NULL,'2024-12-08 20:50:30','2024-12-08 20:50:30'),(2,'Devi Fedrianingsih','devifedrianingsih@gmail.com',NULL,'$2y$12$WFAwLweGhWGc4tzqetBilOPeS6d/e8Ph4/gFPmzK50/89ETMj6ssW',NULL,'2024-12-19 17:32:41','2024-12-19 17:32:41'),(3,'Dean','dean@mail.com',NULL,'$2y$12$CjoPSkAlv495s429JAM8heVaVjneGNcKp/R0TjioeqVgLClfQuyq6',NULL,'2024-12-08 20:50:30','2024-12-08 20:50:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gerobak_listrik'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-24 22:35:07
