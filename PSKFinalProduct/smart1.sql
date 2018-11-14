-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql.smart1.zakbrinlee.com
-- Generation Time: Jun 15, 2018 at 12:14 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart1`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(10) UNSIGNED NOT NULL,
  `bio` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `bio`, `name`) VALUES
(0, 'Test', 'Testing Tester'),
(1, NULL, 'Priyanka Raha'),
(2, NULL, 'Shikha Das Shankar'),
(3, NULL, 'Testing Test'),
(4, NULL, 'Nick Bennett'),
(6, NULL, 'blah'),
(7, NULL, 'Robo Jojo'),
(8, NULL, 'dedbug'),
(9, NULL, 'gandy'),
(10, NULL, 'Zak'),
(12, NULL, 'Zak Brinlee'),
(13, NULL, 'Robot Jones');

-- --------------------------------------------------------

--
-- Table structure for table `blog_simple`
--

CREATE TABLE `blog_simple` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(100) NOT NULL,
  `body` longtext CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_simple`
--

INSERT INTO `blog_simple` (`id`, `title`, `author_id`, `date`, `body`, `keywords`) VALUES
(63, 'How to make the best of the digital world around us', 1, 'October 17, 2017', '<div>If I approach you with a question&nbsp;&ldquo;Does your child come and ask you to take a look at her/his creations while playing&rdquo;, you would give me a huge nodding yes. Now if I asked you &ldquo;Does your child come and ask you&nbsp;to take a look at her/his creations while playing on her/his digital device&rdquo;, the nods would go down to somewhere between sometimes to never. There simply is no way for me as a parent today to participate in my child&rsquo;s quests and achievements in her/his digital space, other than looking over her/his shoulder.&nbsp;There is no denying the fact that phones and tablets are here to stay.</div>\r\n<div>&nbsp;</div>\r\n<div>So how will you hold your child&rsquo;s hand in the digital world? Today she/he is alone there.</div>\r\n<div>Check out this amazing lady talk about screen time for kids on TED:&nbsp;\r\n<div>\r\n<div><iframe src=\"https://embed.ted.com/talks/lang/en/sara_dewitt_3_fears_about_screen_time_for_kids_and_why_they_re_not_true\" width=\"854\" height=\"480\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"\"></iframe></div>\r\n</div>\r\n</div>', 'TED Children creativity Sara DeWitt'),
(64, 'More Mentoring Than Monitoring', 1, 'December 1, 2017', '<p><img src=\"../images/baby-boy-child-159533.jpg\" alt=\"\" width=\"408\" height=\"272\" /></p>\r\n<p>We live in different times. Our generation is the one that saw the progress of digital media in leaps and bounds. Around 50% of the world population has an internet connection today in comparison to 1% in 1995*. We saw the internet being transformed from exotic to an everyday necessity. If we have house guests today we welcome them with food, a comfortable bed and our wifi password. Our kids are going to be the first generation to grow up with digital devices. We are the first to raise a generation of digital citizens. It is almost like we have discovered fire and we have to keep our kids from going near it to prevent them from harm. In order to protect our children we are busy monitoring their interaction with the screens and in doing so we are forgetting to mentor the next generation so that they become the best citizens in our digitally connected world.</p>\r\n<p><a href=\"https://www.raisingdigitalnatives.com/about/\">Deborah Heitner</a>, founder of&nbsp;<a href=\"https://www.raisingdigitalnatives.com/\">Raising Digital Natives</a>, deftly points out that mentoring is much more crucial than monitoring in managing screen times for children. Raising kids is hard work and the digital media just adds another staggering layer of difficulty on top of an already uphill task. I think the time is now when we need to participate with our kids in the digital space. We need to make our digital participation an extension of the social interaction with our children, one that is smooth and seamless and one that will make them strategic thinkers in the physical world and beyond.</p>', 'Mentoring Internet Access Raising Digital Natives Deborah Heitner '),
(65, 'Engagement not Entrapment', 1, 'December 15, 2017', '<p><img src=\"../images/0.jpg\" alt=\"\" width=\"500\" height=\"337\" /></p>\r\n<p>Recently I had the privilege of teaching a class of second graders for five weeks. As I walked in the door I was confident on my preparation that I had done the previous day, the list of activities I had planned out and the timetable. But I was far from ready. What I hadn&rsquo;t anticipated is that kids go from one activity to another as swiftly as notes change on a song. The environment around them is a vast ocean of knowledge and they are like little sponges ready to absorb all this. There is absolutely no down-time which left me with zero transition time for prep from one activity to another. Not just that these little minds have so much to share and so many stories to tell. I never found enough time for everyone to speak during the sharing portion of my class. As I would get things ready for the next activity I found confusion taking over my class because the kids would each find their own thing to do. I realized the importance of engagement. Eventually I got better with the class but I never stopped wondering about the enormity of engagement and how it is half-baked in the digital space for kids. And by engagement I don&rsquo;t mean kids being glued to the screen, that is not engagement, that is entrapment.&nbsp;</p>\r\n<div>True engagement is when both parties get to share and equally participate. In the case of a child engaged with his tablet this can only happen when there is active involvement and flow of ideas from him to the digital space and not just the other way around. As parents, educators and adults what that means is that the onus is on us to find the right media to nurture these minds and to challenge them. Let&rsquo;s not stop at that, let&rsquo;s make this a part of our social space, let&rsquo;s ask them about their favorite shows or games - why do they like it, who is their favorite character and why. It&rsquo;s as simple as inculcating comprehension after they have read a story, why not do the same for the digital media?&nbsp;<br />\r\n<div><br />I had the benefit of witnessing the fact that kids love to share their stories, all we have to do is ask.</div>\r\n<div>&nbsp;</div>\r\n<div>I like the work that Common Sense Media is doing in this regard. Check out how you can search for age-appropriate media for your kids, like find apps for age 7-8 yrs.&nbsp;</div>\r\n<br />\r\n<div><a href=\"https://www.commonsensemedia.org/reviews/age/7/age/8/category/app\">https://www.commonsensemedia.org/reviews/age/7/age/8/category/app</a>&nbsp;<br /><br /></div>\r\n</div>\r\n<div><br />\r\n<div>PS: I cannot conclude this story without thanking Mrs. Megan Younglove (<a href=\"https://twitter.com/mgyounglove\" target=\"_blank\" rel=\"noopener\">@myounglove</a>), second grade teacher from Cougar Ridge Elementary, for her immense help and support during my short stint with teaching her class.</div>\r\n</div>', 'Teaching Second Grade Engagement Entrapment Cougar Ridge Elementary'),
(66, 'Connection is why we are here', 1, 'January 12, 2018', '<p><img src=\"../images/Design Ideas.001.jpg\" alt=\"\" width=\"768\" height=\"400\" /></p>\r\n<p>&nbsp;</p>\r\n<p>Many years ago I came across an invigorating talk from Brene Brown*. She spoke about several wonderful things on discovering worthiness, the power of vulnerability and other key attributes that define our social behavior. But there was one thing that stuck with me. Connection is why we are here. Inherently whatever we do and how we interact, we want to feel connected to others. It is our most primal and social urge of being. Now think the world today, we cannot imagine our lives without a computer, tablet or a phone. As an adult these are great resources that help us get through our days. These are also great tools for growth and development for our future generation - with one caveat. It needs to be designed and used the right way. The digital space is like a playground, I guess we need better playground equipments. Yet here we are today when almost all the apps that our kids interact with on their tablets and computers lack the most important aspect of human development - collaboration. The lexical meaning of collaboration is the action of working with someone to produce something. Yet it encompasses much more than that - it is Darwinian. It is how we humans have thrived through millions of years of evolution. It is the art of true collaboration that will help us progress. The opportunities are limitless for the touch-screen generation. My second-grader&rsquo;s class uses a seesaw account (<a href=\"https://web.seesaw.me/\">https://web.seesaw.me/</a>) to share their accomplishments with each other and with their parents. Think facebook but the network can only be accessed by the class-parents and students can post things after their teacher has approved them. So it&rsquo;s not just a closed environment but it is both a monitored as well as a mentored space. It&rsquo;s a great way for parents to connect with their child&rsquo;s achievements. At the same time it&rsquo;s a great way to teach the next generation the importance of responsible social collaboration in the digital space. And that is the only way to thrive and evolve.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div>*<a href=\"https://www.ted.com/talks/brene_brown_on_vulnerability?utm_campaign=ios-share&amp;utm_medium=social&amp;source=email&amp;utm_source=email\">The power of vulnerability</a></div>\r\n<div>&nbsp;</div>', 'Brene Brown Vulnerability Connection Interaction Seesaw'),
(67, 'Unleashing their Imagination', 2, 'March 6, 2018', '<p><strong>Storytelling from the very young</strong></p>\r\n<p>&nbsp;<img src=\"../images/IMG_5953.jpg\" alt=\"\" width=\"500\" height=\"375\" /></p>\r\n<p>She would ask sometimes, are there any fire trucks in there? Now, which toddler doesn&rsquo;t like the sight of a fire truck? It&rsquo;s big, fast, noisy and grade-A fodder for their imagination. So her disappointment at not having seen any come out or enter her favorite station seemed valid. And then one gloomy Seattle-eastside afternoon, the stars aligned and we pulled over to the right to let the siren-blaring ladder truck maneuver its way out of the station, into the street and eventually down the hill, honoring the call of duty. I did not want to notice her expression through the rearview mirror rather I wanted to soak it in. I cranked my neck toward the back to her smile jubilantly. I started to drive and quick came her question, &ldquo;where is the fire truck going?&rdquo;. &ldquo;To save someone,&rdquo; I said, leaving room for more to come from an imagination that had been fired up from the occurrence. A few more questions, handful of popcorns and two exits later, a story that included her brother, a forest, a deer, a mouse, and brave fire fighters rescuing helpless creatures had been woven, soon to be retold to the remaining members of the family. This is a simple example of how young minds use the art of storytelling to build their imagination, develop language skills and learn to interact with others.&nbsp;<br /><br />Storytelling is a universal phenomenon as old as time. A well-crafted story&mdash;be it tales from ancient times or flights into the future&mdash;is gripping and hard to resist. Children make great artists for this interactive form of art. Their vivid imagination, filter-less lens of seeing the world, and animated, and often amusing, ways of telling a story wins hearts and captivates audience. Provide them with simple props, puppets or just your attention and they will take you on a journey of heroic quests and faraway fairylands. In a child&rsquo;s mind, the realm of fiction and reality are not very different. What begins as an observation on their way from school stretches into an animated story, and what has fascinated them through their favorite books are brought to reality using their imaginations.&nbsp;<br /><br />A few years ago, my dragon-obsessed son&rsquo;s world came shattering down when I told him that these fiery creatures are not real. He wanted to see dragons in real life, asking me to find a zoo that had one. Dragon floor puzzles, books about warriors fighting dragons and hours of pretend play, where he burnt down the house a few times a day with his fire-spitting breath, had led him to believe that dragons where real. Age finally caught up and, although secretly he still wants to believe dragons exist, he has come to terms with the bitter truth.&nbsp;<br /><br />Looking back at those days makes me think what if there is a way for them to bring these creatures to life? What if there is a way to give wings to their burgeoning creative skills even before they can read or write well enough to put their ideas on paper? What if there is a way for our children to use technology as an extension of their imagination rather than one that inhibits it? What if there is a way to collaborate with our children to use the digital space for creating stories that last a lifetime? Like building blocks, if technology allows our children to build their own stories step-by-step, and see them come to life, wouldn&rsquo;t that be enabling and engaging at the same time? Collaborative use of technology allowing parents to see their child&rsquo;s mind at work and adding their own strokes of creativity is a win-win situation. An ongoing effort by team PopSmartKids is developing an interface that does just that and much more. Use of imagination, preserving memories, quality time with children will be few of the outcome of what the team has been working on. Keep following us and watch this space for more!</p>', 'Imagination Fire Trucks Fire Fighters Seattle Children Storytelling Art Dragon Ideas'),
(68, 'Going Strong', 2, 'March 29, 2018', '<p><img src=\"../images/PSK_Storytelling_part2.jpg\" alt=\"\" width=\"450\" height=\"338\" /></p>\r\n<p><em>It is in our nature to hold on to traditions that are valuable to our family, and if the tradition is simple, engaging and has been integral to human evolution, like storytelling, it is worth holding on to.</em>&nbsp;</p>\r\n<p>For decades, a wieldy little blunt knife is a cherished belonging of little children in a Yupik-speaking Eskimo village of Alaska. Their sense of ownership and responsibility is immense for this handmade toy given to them by elders in the family. Carved out of wood or bone, a&nbsp;yaaruin, or a story knife, is used to draw pictures on snowy banks or ground while simultaneously telling a story. Squatted on the ground in a circle, children draw and tell stories for hours, learning language skills, valuable lessons like good behavior and entertaining each other. The tradition continues even today, the authentic wooden or bone&nbsp;yaaruin&nbsp;replaced with the common butter knife oftentimes.</p>\r\n<div>Across the Pacific, all the way to China, a stage with a thin white cloth screen, uncustomary to other forms of puppetry around the world, has been set to entertain guests of all ages. While the concept is similar to string doll puppetry tradition of India, the detailed artwork that goes into creating shadow puppets is unlike any other. The puppeteers have worked meticulously to make delicate paper-like cutouts of characters, joined together with thread, so they can be dangled freely across the white screen to create moving shadows. The dexterity of the puppet operator is worth mentioning as he is skilled to play up to five puppets at a time, each of which has three strings attached to it. Coordination, music and a compelling story, usually derived from a Chinese folklore, come together to create the magic of a 2000-year-old ancient Chinese Shadow Puppet tradition for its audience even today. At the heart of this tradition is a desire to tell a story right out of the pages of Chinese history and continue this storytelling art for generations to come.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Storytelling was planted in our genes some 40000 years ago when our ancestors, the Neanderthals, told their story of hunting, food, and survival by drawing on the recesses of deep dark caves. They only needed a flickering fire and chiseled rock to do so.&nbsp;&nbsp;Humans evolved and so did forms of storytelling. Oral narratives became critical to the evolution of human language, culture and traditions. Songs and sonnets or chants and epic poetry became a way of life.&nbsp;&nbsp;Drawings and oral traditions turned into scripts, scripts into books, and what was previously only word of mouth turned into written records. The advent of technology, media and eventually the Internet facilitated audio, visual and written narratives unprecedentedly. Even in this digital age, traditional forms of storytelling stay close to our heart and continue to be passed down as a tradition.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>What&rsquo;s your family storytelling tradition? Is rainy day a finger puppet kind-of-a-day with your kids? Maybe a little rush of adrenaline on a dark night, over campfire and toasted marshmallows, is what brings out the storyteller in you? We would love to hear your family&rsquo;s unique, special or funny story telling tradition in the comments below!</div>', 'Toys Children Tradition Storytelling Alaska Eskimo Yaaruin Shadow Puppet '),
(69, 'Staying Close to Nature', 2, 'May 1, 2018', '<div>\r\n<div><em>Despite the cold, wet April we have gotten so far, spring is a wonderful time to explore nature with the kids in several ways.&nbsp;</em></div>\r\n</div>\r\n<div class=\"p1\" style=\"color: #333333; font-family: Arial, Tahoma, Helvetica, FreeSans, sans-serif; font-size: 14.85px;\"><span class=\"s1\" style=\"font-kerning: none;\"><span style=\"font-family: Times, \'Times New Roman\', serif; font-size: small;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"../images/PSK3_Springpostpic.jpg\" alt=\"\" width=\"550\" height=\"366\" /></span></span></div>\r\n<div>&nbsp;</div>\r\n<div>It was the beginning of April, and the light green colored leaves, tiny chirping birds and seasonal allergy-struck households meant that spring was supposed to have arrived. But what had arrived was the spring of deception&mdash;a phrase coined with the sole aim to depict the deceit of a month that should have been warmer and brighter. With the spring break around the corner, my plans to spend plenty of time playing outdoors with the kids where going to be dampened by the heavy rains forecast.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>When my son started kindergarten, and his routine started to resemble a 9-5 job, I looked forward to school breaks, as it gave me an opportunity to slow down the pace of life. These breaks were a perfect way to replace morning madness of packing lunches and hustling the kids out of the door to catch the bus with lazy mornings, sipping coffee that was still hot, tackling floor puzzles with them and letting them stay in pajamas till lunch time. There is the&nbsp;frazzling aspect of having kids at home too&mdash;snack demand by the hour, bantering and whining around the clock, and the mess! Despite that, finding a way to connect with our children that regular weekdays don&rsquo;t allow us, and in the process, making lifetime memories becomes the essence of these breaks. Traveling with kids is a preferred way to spend the break for many and for others having house guests. Neither was in our plans and looking at the expected rains in the PNW, I was starting to scratch my head to come up with ideas to keep the kids busy.</div>\r\n<div>&nbsp;</div>\r\n<div>The break started with the only sunny day in the entire week and we hopped over to the zoo with friends that day. For the remaining days, indoor playtime&mdash;boardgames, puzzles, building and chasing each other formed a large chunk of the kids&rsquo; morning but started to wear off by mid-afternoon. Their active minds needed more engagement than their playroom could provide. Keeping nature at the core of it, several simple and fun ideas worked great for us.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Birdwatching:&nbsp;And hours of it! Three pairs of binoculars, a bird watching book and lots of fingerprints on the bedroom window were evidence to prove us guilty of stalking cute little birds in our backyard. While birdwatching is an extensive outdoor activity, we were lucky to spot the most popular birds of the season, as they frequented the trees surrounding our house, right from our bedroom windows. My toddler enjoyed copying the birds&rsquo; melodious chirping while my son was hard at work with the binoculars. I took it a step further with him, and downloaded a very informative backyard bird app, which provides details of hundreds of birds by their names and family group.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Walk it Out:&nbsp;Unpaved hiking trails, especially ones with elevation, can be risky when there is incessant rain but the paved ones are safe and accessible most of the year. Arboretums and nature preserves usually have paved trails that are perfect for walks with kids, rain or shine. Our local botanical garden, the&nbsp;Washington Park Arboretum, recently opened a 1.2-mile long asphalt loop trail to walkers and cyclists, and we couldn&rsquo;t be happier. A walk around the neighborhood with the sole purpose of&nbsp;jumping up and down in muddy puddles,&nbsp;Peppa Pig&nbsp;style, worked just as well. Finding the perfect muddy puddle was a daunting task, one that should not be sidetracked by thoughts of muddy mess that was to ensue in my house&mdash;a mental note I made to myself while on this excursion.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Nature Journal:&nbsp;Have a budding Thoreau in your house? Do you find pebbles, rocks, dried leaves and flowers making their way into your living room after every outdoor activity? Maintaining a nature journal is an engaging way to encourage your child to continue his enthusiasm for nature. It can be as simple as the child drawing his observation on sheets of paper, and over the course of time, stapling them together to make a nature book. For older kids, going the full mile by investing in a hardbound or paperback journal, log book, magnifying glass amongst other things will help them document their findings, develop writing skills, and grow interest in nature. Another easy way is to store findings from nature in zip pouches, and including a note written by the child about the item in the pouch.</div>\r\n<div>&nbsp;</div>\r\n<div>Planters:&nbsp;Planting to make your entry-way look appealing or simply planting a few herbs for your kitchen garden, this spring time activity never fails. Kids can have a great deal of ownership while involved in this fun activity by letting them decide on the planters, helping you lift the bags of soil into the cart and choosing the plants they want to grow.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Documentary:&nbsp;There is plenty of nature and wildlife related documentary series on popular streaming channels, and all of them comprise quality screen time. Currently, we are hooked onto&nbsp;The Planet Earth&nbsp;and&nbsp;The Blue Planet&nbsp;series on Netflix that cover nature and wildlife extensively. David Attenborough&rsquo;s resonating voice and the stunning visuals will keep everyone glued to their seats.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Spring seems to be finally here with the weather looking better. Schools are working to wrap up another academic year, and families are planning summer trips, enrolling children in summer camps and many even taking out time for spring-cleaning. Whatever your spring goals are, the best part of the season is the happiness it brings in knowing that summer in just around the corner. Happy Spring!</div>', 'Birdwatching Nature Walking Hiking Washington Park Arboretum Journal Planters Documentary Children Spring'),
(70, 'Have you thanked the 21st Century Teacher?', 1, 'May 11, 2018', '<p>A quick google search will reveal that the following terms are very common - &lsquo;the 21st century teacher&rsquo;, &lsquo;the 21st century learner&rsquo;, &lsquo;the 21st century school&rsquo;. On the other hand terms like the 20th century teacher or learner, not so much. I think the following statistic has something to do with that. Today almost all public schools are connected to the internet, that number was 91 percent in 2008 and 15 percent in 1997. Which means the teachers who are teaching in these classrooms today did not grow up in a classroom like this. On top of that they have to prepare the next generation who will most seemingly live in a world that looks different from what it is today. Technology brings it&rsquo;s own set of rewards and challenges. If you thought your job was difficult hand-holding just your child and helping him navigate in this quasi-digital world, then think classroom management of 20 or more kids. The difference is scale and theme. Besides just teaching content, teachers now have to teach digital citizenship, connectivity and social responsibility with respect to the physical and digital communities. The teacher appreciation week that went by got me thinking the uber important role that teachers play in the ever changing dimensions that technology brings. Teachers are responsible for giving the students the tools to learn most effectively on the web. Teach them to take command of their learning by using technology. Teach them to be responsible while making technology a conscious choice.</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"../images/Technology Choice - local school.png\" alt=\"\" width=\"810\" height=\"818\" /></p>\r\n<p>Allowing a space for discovery through technology, coaching the class that technology is one of the many choices of activities, and educating the digital natives to own their technology and not the other way around - these are a few of the challenging tasks that the teachers perform to prepare the next generation for the future. There are a million reasons to thank a teacher but today I am going to be thankful for their adaptability in the changing times and for preparing the next generation to live and prosper in a future that is more seeming than present.</p>\r\n<p><br />So, have you thanked the 21st century teacher?</p>', 'Teacher Teaching Children Classrooms 21st Century 20th Century New School '),
(71, 'Can we fight FOMO while raising digital citizens?', 1, 'May 24, 2018', '<p>Apparently &lsquo;<strong>Fear of Missing Out</strong>&rsquo; is a real term. All throughout this article I will be using the acronym FOMO, well because it sounds much cooler. FOMO first originated in the early 2000s in a Harvard Business School article*, to describe grad students&rsquo; frantic, text-driven social lives.&nbsp; &nbsp;<img src=\"../images/TeachingBetterDigitalPractices.jpg\" alt=\"\" width=\"768\" height=\"400\" /></p>\r\n<div>\r\n<div>Facebook did not exist then and neither did a million other social networks. The arrival of social media has definitely supercharged FOMO. In 2013 this clever term was officially added to the Oxford Dictionary. It reads &lsquo;Anxiety that an exciting or interesting event may currently be happening elsewhere, often aroused by posts seen on social media&rsquo;. Apparently &lsquo;Fear of Missing Out&rsquo; is a real term. All throughout this article I will be using the acronym FOMO, well because it sounds much cooler. FOMO first originated in the early 2000s in a Harvard Business School article*, to describe grad students&rsquo; frantic, text-driven social lives. Facebook did not exist then and neither did a million other social networks. The arrival of social media has definitely supercharged FOMO. In 2013 this clever term was officially added to the Oxford Dictionary. It reads &lsquo;Anxiety that an exciting or interesting event may currently be happening elsewhere, often aroused by posts seen on social media&rsquo;.&nbsp;</div>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div>\r\n<div>I have thought about it - Am I a victim of FOMO? But then I tell myself &lsquo;Nah, I am just keeping in touch with everyone and everything.&rsquo; There is a fine line between staying in touch and being anxious about it. Don&rsquo;t worry, I am not here to paint a grim picture. Quite the contrary, I love how social media adds value to our lives, besides the obvious &lsquo;connecting with your friends&rsquo; - recruiting, career building, raising money for a just cause - the list is endless. Never before has an artist had the power to get into a conversation directly with their audience. What a solace it was for me, as a first-time mom, to read from other mom-posts that my 3-year-old&rsquo;s behavior is nothing out-of-the-ordinary. Technology provides that mom-in-need the power to reach out to her community, beyond the constraints of geographical boundaries, to tap into the collective knowledge. Tell me you haven&rsquo;t searched - &rsquo;10 fun things you can do with kids&rsquo; or &lsquo;Find the best summer camps in town&rsquo;.</div>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div>\r\n<div>While this is all great, we all worry about distraction and focus. So now we have this important job of teaching our kids to be mindful and responsible while tapping into the social media. Let&rsquo;s not forget, there is no escaping this and if preached it can truly be very powerful. My seven year old did a multi-media presentation of him talking about planets as part of a class project. I wasn&rsquo;t there. His teacher shared it with me and now I can share it with my parents. In terms of teaching our next generation to be better digital citizens, I am going to lean in to the slogan that Common Sense Education uses - &lsquo;Don&rsquo;t Make a Ban Have a Plan&rsquo;.&nbsp;</div>\r\n</div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n<div>\r\n<div>Now I want to lean in to all the parents and educators and conscious adults out there,</div>\r\n</div>\r\n<div>\r\n<div>What are some of your suggestions for meaningful things that kids can do with their devices?</div>\r\n</div>\r\n<div>\r\n<div>How do you teach your kids to not be afraid of missing out?</div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div>\r\n<div>How do you teach them better digital practices?</div>\r\n<div>&nbsp;</div>\r\n<div>*&nbsp;<a href=\"http://www.harbus.org/2004/social-theory-at-hbs-2749/\" target=\"_blank\" rel=\"nofollow noopener\">HBS Article</a></div>\r\n</div>', 'FOMO Fear Of Missing Out Children Harvard Social Media '),
(72, 'Freedom of the Digital Citizen', 1, 'May 31, 2018', '<div>If you read my last blog you know we are eager about mentoring safe practices to the digital citizens.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"../images/DigitalCitizenship.jpg\" alt=\"\" width=\"768\" height=\"400\" /></div>\r\n<div>&nbsp;</div>\r\n<div>This week we are diving straight into talking about freedom of the digital citizen. Why? Because being a citizen entitles one to have the rights and privileges of a freeman. The Memorial Day this week got me thinking about the significance of freedom, the sacrifice it takes from our brave soldiers to establish that and how we must protect and honor it. We live in a free world. As free citizens it is a little hard to comprehend the subjection to foreign domination or despotic government. So as I was speaking to my 7-year old about the power of freedom we went through hypothetical scenarios of what it would mean to not have freedom. It could be freedom of any kind - speech, act or thought. We relied on stories from history. The more I thought about freedom I realized that I will have to educate my child on what freedom means in the digital world as he is growing up in an age where online presence is as significant (if not more) as one&rsquo;s physical presence. 73% of teenagers between the ages of 12 and 17 have social network profiles. 93% of teenagers use the internet to go online. Digital Citizenship is no longer an add-on term, it is how we should be teaching our children. Freedom goes hand-in-hand with responsibilities. As free digital citizens we have responsibilities, ones that we must not ignore. The International Society for Technology in Education&nbsp;(ISTE), a nonprofit membership association for educators focused on educational technology, vehemently focusses on Digital Citizenship as a component in it&rsquo;s standards for students. Students understand human, cultural and societal issues related to technology and practice legal and ethical behavior. So how do we teach our children about responsible digital citizenship.</div>\r\n<div>&nbsp;</div>\r\n<div>I realize the following is not a comprehensive list but it is a good one to begin with.&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>I will use my personal device for educational purposes only when I am at school.</div>\r\n<div>I will make sure I am safe and appropriate when I am online.</div>\r\n<div>I will protect my private info and the information of others.</div>\r\n<div>I will respect myself and others when I am online.</div>\r\n<div>I will use kind words on social media and remember that my &lsquo;digital footprint&rsquo; should not harm others.</div>\r\n<div>I will stand up and say no to cyberbullying. I will tell an adult if someone is being unkind or harmful.</div>\r\n<div>&nbsp;</div>\r\n<div>What do you think are other things that can be added to this list?</div>', 'Freedom Digital Citizen Rights Memorial Day Sacrifice ISTE Declaration  ');

-- --------------------------------------------------------

--
-- Table structure for table `comments_simple`
--

CREATE TABLE `comments_simple` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `post` int(11) UNSIGNED NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `is_admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments_simple`
--

INSERT INTO `comments_simple` (`id`, `name`, `comment`, `post`, `status`, `is_admin`) VALUES
(76, 'Zachary Brinlee', 'This was a great article!', 70, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nlSubscribers`
--

CREATE TABLE `nlSubscribers` (
  `subscriberID` int(11) NOT NULL,
  `subscribed` enum('Y','N') NOT NULL DEFAULT 'Y',
  `subs_email` varchar(60) NOT NULL,
  `beta` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nlSubscribers`
--

INSERT INTO `nlSubscribers` (`subscriberID`, `subscribed`, `subs_email`, `beta`) VALUES
(1, 'Y', 'test@test.com', 'Y'),
(3, 'Y', 'best@test.com', 'Y'),
(4, 'Y', 'email@test.edu', 'Y'),
(24, 'Y', 'Hello@test.com', 'Y'),
(25, 'N', 'ZakLibrary@example.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(10) NOT NULL,
  `productName` varchar(60) NOT NULL,
  `image` varchar(60) DEFAULT 'images/appicon1.png',
  `androidLink` varchar(60) DEFAULT NULL,
  `appleLink` varchar(60) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL,
  `keywords` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `image`, `androidLink`, `appleLink`, `description`, `status`, `keywords`) VALUES
(107, 'PopSmartKids App', '/images/image.png', 'google.com', 'apple.com', 'This app is designed to help you and your child connect, play, and learn together. In this adventure, you will journey to the magical Kingdom of Java, in the forgotten land of Cee. You will meet friends like the wonderful Queen Plusplus, and crazy Captain Cobol as you unravel the mystery of the Universal Compiler. But beware the wicked machnations of Kotlin the Phantom Lord; who seeks to use the Universal Compiler for his own vile deeds.', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `retro_Admin`
--

CREATE TABLE `retro_Admin` (
  `AdminID` int(10) UNSIGNED NOT NULL,
  `LastName` varchar(50) DEFAULT '',
  `FirstName` varchar(50) DEFAULT '',
  `Email` varchar(120) DEFAULT '',
  `Privilege` enum('admin','superadmin','developer') DEFAULT 'admin',
  `AdminPW` varchar(255) DEFAULT NULL,
  `NumLogins` int(11) DEFAULT '0',
  `DateAdded` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `retro_Admin`
--

INSERT INTO `retro_Admin` (`AdminID`, `LastName`, `FirstName`, `Email`, `Privilege`, `AdminPW`, `NumLogins`, `DateAdded`, `LastLogin`) VALUES
(1, 'Sprockets', 'Spacely', 'developer@example.com', 'developer', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 135, '2018-05-18 14:03:21', '2018-05-18 14:03:21'),
(2, 'Jetson', 'George', 'superadmin@example.com', 'superadmin', '92429d82a41e930486c6de5ebda9602d55c39986', 6, '2018-05-29 08:00:57', '2018-05-29 08:00:57'),
(18, 'Sprockets', 'Spacely', 'zak@example.com', 'developer', '92429d82a41e930486c6de5ebda9602d55c39986', 75, '2018-06-04 18:52:30', '2018-06-04 18:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `webadmin`
--

CREATE TABLE `webadmin` (
  `AdminID` int(10) UNSIGNED NOT NULL,
  `LastName` varchar(50) DEFAULT '',
  `FirstName` varchar(50) DEFAULT '',
  `Email` varchar(120) DEFAULT '',
  `Privilege` enum('admin','superadmin','developer') DEFAULT 'admin',
  `AdminPW` varchar(255) DEFAULT NULL,
  `NumLogins` int(11) DEFAULT '0',
  `DateAdded` datetime DEFAULT NULL,
  `LastLogin` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webadmin`
--

INSERT INTO `webadmin` (`AdminID`, `LastName`, `FirstName`, `Email`, `Privilege`, `AdminPW`, `NumLogins`, `DateAdded`, `LastLogin`) VALUES
(1, 'Sprockets', 'Spacely', 'developer@example.com', 'developer', '92429d82a41e930486c6de5ebda9602d55c39986', 6, '2018-04-27 22:21:15', '2018-04-27 22:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `webadmins`
--

CREATE TABLE `webadmins` (
  `webAdminID` int(11) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `loginEmail` varchar(60) NOT NULL,
  `Privilege` enum('admin','superadmin','developer') NOT NULL,
  `AdminPW` varchar(60) NOT NULL DEFAULT 'psk12345',
  `NumLogins` int(11) NOT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webadmins`
--

INSERT INTO `webadmins` (`webAdminID`, `lastName`, `firstName`, `loginEmail`, `Privilege`, `AdminPW`, `NumLogins`, `dateCreated`) VALUES
(1, 'clontz', 'alex', 'vonclontz@gmail.com', '', 'psk12345', 0, '2018-04-19 10:44:25'),
(2, 'Sprockets', 'Spacely', 'developer@example.com', 'developer', 'asdfasdf', 0, '2018-04-19 22:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `weblogins`
--

CREATE TABLE `weblogins` (
  `accessID` int(11) NOT NULL,
  `loginDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `webAdminID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `blog_simple`
--
ALTER TABLE `blog_simple`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `comments_simple`
--
ALTER TABLE `comments_simple`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post` (`post`);

--
-- Indexes for table `nlSubscribers`
--
ALTER TABLE `nlSubscribers`
  ADD PRIMARY KEY (`subscriberID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD UNIQUE KEY `productName` (`productName`);

--
-- Indexes for table `retro_Admin`
--
ALTER TABLE `retro_Admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `webadmin`
--
ALTER TABLE `webadmin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `webadmins`
--
ALTER TABLE `webadmins`
  ADD PRIMARY KEY (`webAdminID`),
  ADD UNIQUE KEY `loginEmail` (`loginEmail`);

--
-- Indexes for table `weblogins`
--
ALTER TABLE `weblogins`
  ADD PRIMARY KEY (`accessID`),
  ADD KEY `webAdminID` (`webAdminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_simple`
--
ALTER TABLE `blog_simple`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `comments_simple`
--
ALTER TABLE `comments_simple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `nlSubscribers`
--
ALTER TABLE `nlSubscribers`
  MODIFY `subscriberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `retro_Admin`
--
ALTER TABLE `retro_Admin`
  MODIFY `AdminID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_simple`
--
ALTER TABLE `blog_simple`
  ADD CONSTRAINT `blog_simple_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments_simple`
--
ALTER TABLE `comments_simple`
  ADD CONSTRAINT `comments_simple_ibfk_1` FOREIGN KEY (`post`) REFERENCES `blog_simple` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
