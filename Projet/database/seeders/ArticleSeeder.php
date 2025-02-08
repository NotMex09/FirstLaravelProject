<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        $articles = [
            // Theme 1: Artificial Intelligence
            [
                'title' => 'The Future of AI in Healthcare',
                'content' => 'Artificial Intelligence (AI) is revolutionizing the healthcare industry by enabling faster and more accurate diagnoses, personalized treatment plans, and predictive analytics. AI-powered tools are helping doctors detect diseases like cancer at earlier stages, significantly improving patient outcomes. For instance, machine learning algorithms can analyze medical images, such as X-rays and MRIs, to identify abnormalities that might be missed by the human eye. Additionally, AI is being used to develop personalized treatment plans based on a patient’s genetic makeup, lifestyle, and medical history. This approach, known as precision medicine, is transforming how diseases are treated and managed. AI is also playing a crucial role in drug discovery, where it can analyze vast amounts of data to identify potential drug candidates in a fraction of the time it would take using traditional methods. Furthermore, AI-powered chatbots and virtual assistants are improving patient engagement by providing 24/7 support and answering common health-related questions. As AI continues to evolve, its applications in healthcare are expected to expand, leading to better patient care, reduced costs, and improved efficiency across the industry.',
                'theme_id' => 1,
                'user_id' => 2,
                'status' => 'published',
                'image' => 'articles/ai-healthcare.jpg',
            ],
            [
                'title' => 'AI and Machine Learning in Education',
                'content' => 'Artificial Intelligence (AI) and Machine Learning (ML) are transforming the education sector by personalizing learning experiences, automating administrative tasks, and providing real-time feedback to students. These technologies are helping educators identify struggling students and tailor lessons to their individual needs. For example, AI-powered platforms can analyze student performance data to identify areas where they are struggling and recommend targeted resources to help them improve. Additionally, AI is being used to automate administrative tasks, such as grading assignments and managing schedules, freeing up teachers to focus on instruction. Virtual tutors and chatbots are also becoming increasingly common, providing students with instant support and answering their questions outside of class hours. Furthermore, AI is enabling the development of adaptive learning systems that adjust the difficulty of content based on a student’s progress, ensuring that they are always challenged but not overwhelmed. As AI and ML continue to advance, their applications in education are expected to grow, leading to more personalized and effective learning experiences for students of all ages.',
                'theme_id' => 1,
                'user_id' => 8,
                'status' => 'published',
                'image' => 'articles/ai-education.jpg',
            ],
            [
                'title' => 'The Ethics of Artificial Intelligence',
                'content' => 'As Artificial Intelligence (AI) continues to grow, ethical concerns related to privacy, bias in decision-making algorithms, and job displacement are becoming more prominent. One of the primary ethical challenges is ensuring that AI systems are fair and unbiased. Since AI algorithms are trained on historical data, they can inadvertently perpetuate existing biases, leading to unfair outcomes. For example, AI-powered hiring tools have been found to favor certain demographics over others, raising concerns about discrimination. Another ethical issue is the impact of AI on employment. As AI automates more tasks, there is a risk of job displacement, particularly in industries that rely heavily on manual labor. Additionally, the use of AI in surveillance and data collection raises significant privacy concerns. Governments and organizations must establish guidelines and regulations to ensure that AI is used responsibly and ethically. This includes transparency in how AI systems make decisions, accountability for their outcomes, and measures to protect individuals’ privacy. As AI continues to evolve, addressing these ethical challenges will be crucial to ensuring that it benefits society as a whole.',
                'theme_id' => 1,
                'user_id' => 9,
                'status' => 'approved',
                'image' => 'articles/ethics.png',
            ],
            [
                'title' => 'AI in Autonomous Vehicles',
                'content' => 'Autonomous vehicles rely heavily on Artificial Intelligence (AI) to navigate roads, avoid obstacles, and make real-time decisions. AI-powered systems, such as computer vision and machine learning algorithms, enable self-driving cars to perceive their environment and respond to changing conditions. For example, computer vision systems use cameras and sensors to detect pedestrians, other vehicles, and traffic signs, while machine learning algorithms analyze this data to make driving decisions. AI is also being used to improve the safety and efficiency of autonomous vehicles. For instance, predictive analytics can anticipate potential hazards and take preventive actions, such as slowing down or changing lanes. Additionally, AI-powered navigation systems can optimize routes to reduce travel time and fuel consumption. As the technology continues to advance, autonomous vehicles are expected to become more common, leading to reduced traffic accidents, lower emissions, and improved transportation efficiency. However, there are still challenges to overcome, such as ensuring the safety and reliability of AI systems and addressing regulatory and ethical concerns.',
                'theme_id' => 1,
                'user_id' => 3,
                'status' => 'published',
                'image' => 'articles/AI-AutonomousVehicles.jpg',
            ],
            [
                'title' => 'AI in Financial Services',
                'content' => 'Artificial Intelligence (AI) is transforming the financial industry by enabling fraud detection, algorithmic trading, and personalized financial advice. AI-powered systems can analyze vast amounts of data to identify patterns and anomalies, making it easier to detect fraudulent transactions. For example, machine learning algorithms can flag suspicious activities, such as unusual spending patterns or unauthorized access to accounts, in real-time. Additionally, AI is being used in algorithmic trading to analyze market trends and execute trades at optimal times, maximizing returns for investors. AI-powered chatbots and virtual assistants are also improving customer service by providing instant support and answering common financial questions. Furthermore, AI is enabling the development of personalized financial advice platforms that analyze a user’s financial situation and recommend tailored investment strategies. As AI continues to evolve, its applications in the financial industry are expected to grow, leading to improved efficiency, reduced costs, and better customer experiences.',
                'theme_id' => 1,
                'user_id' => 4,
                'status' => 'approved',
                'image' => 'articles/AI-FinancialServices.jpg',
            ],
            [
                'title' => 'AI in Natural Language Processing',
                'content' => 'Natural Language Processing (NLP) is a branch of Artificial Intelligence (AI) that focuses on enabling machines to understand and respond to human language. NLP is being used in a wide range of applications, including chatbots, language translation, and sentiment analysis. For example, AI-powered chatbots can understand and respond to customer inquiries in natural language, providing instant support and improving customer satisfaction. Language translation tools, such as Google Translate, use NLP to translate text from one language to another, making it easier for people to communicate across language barriers. Sentiment analysis, another application of NLP, involves analyzing text data, such as social media posts or customer reviews, to determine the sentiment expressed. This information can be used to gauge public opinion, monitor brand reputation, and improve customer service. As NLP technology continues to advance, its applications are expected to grow, leading to more natural and intuitive interactions between humans and machines.',
                'theme_id' => 1,
                'user_id' => 5,
                'status' => 'published',
                'image' => 'articles/AI-NaturalLanguageProcessing.jpg',
            ],
            [
                'title' => 'AI in Agriculture',
                'content' => 'Artificial Intelligence (AI) is being used in agriculture to optimize crop yields, monitor soil health, and predict weather patterns. AI-powered systems can analyze data from sensors, drones, and satellites to provide farmers with real-time insights into their crops and fields. For example, machine learning algorithms can analyze soil data to recommend the optimal amount of water and fertilizer for each crop, improving yields and reducing waste. Additionally, AI is being used to monitor crop health and detect diseases early, allowing farmers to take preventive actions before the problem spreads. Predictive analytics, another application of AI, can forecast weather patterns and help farmers plan their planting and harvesting schedules. Furthermore, AI-powered robots are being used to automate tasks such as planting, weeding, and harvesting, reducing the need for manual labor and increasing efficiency. As AI continues to evolve, its applications in agriculture are expected to grow, leading to more sustainable and productive farming practices.',
                'theme_id' => 1,
                'user_id' => 6,
                'status' => 'approved',
                'image' => 'articles/AI-Agriculture.jpg',
            ],

            // Theme 2: Internet of Things
            [
                'title' => 'Ai and iot in smarter homes ',
                'content' => 'The Internet of Things (IoT) is making homes smarter, safer, and more energy-efficient. IoT devices, such as smart thermostats, security cameras, and voice assistants, are enhancing the way we live by providing greater convenience and control. For example, smart thermostats can learn a household’s schedule and adjust the temperature automatically, reducing energy consumption and lowering utility bills. Smart security cameras allow homeowners to monitor their property remotely and receive alerts in case of suspicious activity. Voice assistants, such as Amazon Alexa and Google Assistant, enable users to control various devices in their home using voice commands, making it easier to manage daily tasks. Additionally, IoT devices can be integrated into a single system, allowing users to control multiple devices through a single app or interface. As IoT technology continues to advance, its applications in smart homes are expected to grow, leading to more connected and intelligent living spaces.',
                'theme_id' => 2,
                'user_id' => 2,
                'status' => 'pending',
                'image' => 'articles/Homes-smarter.jpg',
            ],
            [
                'title' => 'IoT in Healthcare',
                'content' => 'The Internet of Things (IoT) is revolutionizing healthcare by enabling remote patient monitoring, real-time data collection, and improved treatment plans. IoT devices, such as wearable sensors and smart medical devices, are helping doctors provide better care by continuously monitoring patients’ vital signs and health metrics. For example, wearable devices can track a patient’s heart rate, blood pressure, and glucose levels, providing real-time data that can be used to detect potential health issues early. Additionally, IoT devices are being used to monitor patients with chronic conditions, such as diabetes and heart disease, allowing doctors to adjust treatment plans as needed. IoT is also improving the efficiency of healthcare facilities by automating tasks such as inventory management and equipment maintenance. As IoT technology continues to evolve, its applications in healthcare are expected to grow, leading to better patient outcomes and more efficient healthcare delivery.',
                'theme_id' => 2,
                'user_id' => 3,
                'status' => 'approved',
                'image' => 'articles/IoT-Healthcare.jpg',
            ],
            [
                'title' => 'IoT in Industrial Automation',
                'content' => 'The Internet of Things (IoT) is playing a crucial role in industrial automation by enabling predictive maintenance, real-time monitoring, and process optimization. IoT devices, such as sensors and connected machines, are helping factories become more efficient and cost-effective. For example, sensors can monitor the condition of equipment and predict when maintenance is needed, reducing downtime and preventing costly breakdowns. Additionally, IoT devices can provide real-time data on production processes, allowing manufacturers to identify inefficiencies and make adjustments to improve productivity. IoT is also being used to optimize supply chain management by tracking the movement of goods and materials in real-time. As IoT technology continues to advance, its applications in industrial automation are expected to grow, leading to smarter and more efficient manufacturing processes.',
                'theme_id' => 2,
                'user_id' => 4,
                'status' => 'published',
                'image' => 'articles/IoT-IndustrialAutomation.jpg',
            ],
            [
                'title' => 'IoT in Smart Cities',
                'content' => 'Smart cities are leveraging the Internet of Things (IoT) to improve urban living through smart traffic management, waste management, and energy efficiency. IoT devices, such as sensors and connected infrastructure, are helping cities become more sustainable and livable. For example, smart traffic management systems use sensors and real-time data to optimize traffic flow, reducing congestion and improving air quality. Smart waste management systems use sensors to monitor the fill level of trash bins and optimize collection routes, reducing costs and environmental impact. Additionally, IoT is being used to improve energy efficiency by monitoring and controlling the use of electricity, water, and gas in buildings and public spaces. As IoT technology continues to evolve, its applications in smart cities are expected to grow, leading to more connected and sustainable urban environments.',
                'theme_id' => 2,
                'user_id' => 5,
                'status' => 'approved',
                'image' => 'articles/IoT-SmartCities.jpeg',
            ],
            [
                'title' => 'IoT in Retail',
                'content' => 'The Internet of Things (IoT) is transforming the retail industry by enhancing customer experiences through personalized recommendations, inventory management, and smart checkout systems. IoT devices, such as smart shelves and beacons, are helping retailers improve efficiency and customer satisfaction. For example, smart shelves can monitor inventory levels in real-time and alert staff when items need to be restocked. Beacons can send personalized offers and promotions to customers’ smartphones based on their location in the store, enhancing the shopping experience. Additionally, IoT is being used to automate checkout processes, reducing wait times and improving convenience. As IoT technology continues to advance, its applications in retail are expected to grow, leading to more personalized and efficient shopping experiences.',
                'theme_id' => 2,
                'user_id' => 6,
                'status' => 'published',
                'image' => 'articles/IoT-Retail.jpg',
            ],
            [
                'title' => 'IoT in Agriculture',
                'content' => 'The Internet of Things (IoT) is being used in agriculture to monitor soil conditions, track livestock, and optimize irrigation. IoT devices, such as sensors and drones, are helping farmers increase productivity and reduce waste. For example, soil sensors can monitor moisture levels and nutrient content, providing real-time data that can be used to optimize irrigation and fertilization. Drones can be used to monitor crop health and detect diseases early, allowing farmers to take preventive actions before the problem spreads. Additionally, IoT devices can track the location and health of livestock, providing farmers with real-time insights into their animals’ well-being. As IoT technology continues to evolve, its applications in agriculture are expected to grow, leading to more sustainable and productive farming practices.',
                'theme_id' => 2,
                'user_id' => 7,
                'status' => 'approved',
                'image' => 'articles/IoT-farming.jpg',
            ],
            [
                'title' => 'IoT in Transportation',
                'content' => 'The Internet of Things (IoT) is transforming transportation through smart traffic systems, fleet management, and vehicle tracking. IoT devices, such as sensors and connected vehicles, are improving safety and efficiency on the roads. For example, smart traffic systems use real-time data to optimize traffic flow, reducing congestion and improving air quality. Fleet management systems use IoT devices to track the location and condition of vehicles, allowing companies to optimize routes and reduce fuel consumption. Additionally, IoT is being used to monitor the condition of vehicles and predict when maintenance is needed, reducing downtime and preventing accidents. As IoT technology continues to advance, its applications in transportation are expected to grow, leading to safer and more efficient transportation systems.',
                'theme_id' => 2,
                'user_id' => 8,
                'status' => 'published',
                'image' => 'articles/IoT-Transportation.jpg',
            ],

            // Theme 3: Cybersecurity
            [
                'title' => 'Cybersecurity Threats in 2023',
                'content' => 'As technology advances, so do cybersecurity threats. In 2023, the cybersecurity landscape is more complex than ever, with threats such as phishing, ransomware, and data breaches becoming increasingly sophisticated. Phishing attacks, which involve tricking individuals into revealing sensitive information, are becoming more targeted and harder to detect. Ransomware attacks, where hackers encrypt a victim’s data and demand payment for its release, are also on the rise, targeting both individuals and organizations. Data breaches, which involve unauthorized access to sensitive information, are becoming more common, with hackers targeting everything from personal data to corporate secrets. To protect against these threats, individuals and organizations must adopt a proactive approach to cybersecurity. This includes implementing strong passwords, using multi-factor authentication, and keeping software up to date. Additionally, organizations should invest in cybersecurity training for employees and regularly conduct security audits to identify and address vulnerabilities. As cybersecurity threats continue to evolve, staying informed and vigilant is crucial to protecting sensitive information and maintaining digital security.',
                'theme_id' => 3,
                'user_id' => 3,
                'status' => 'approved',
                'image' => 'articles/Cybersecurity-Threats.jpg',
            ],
            [
                'title' => 'Blockchain Beyond Cryptocurrency',
                'content' => 'Blockchain technology is evolving beyond its cryptocurrency roots, with applications in supply chain management, voting systems, and digital identity verification. Blockchain is a decentralized and secure way of recording transactions, making it ideal for applications where transparency and security are critical. In supply chain management, blockchain can be used to track the movement of goods and materials, ensuring transparency and reducing the risk of fraud. In voting systems, blockchain can provide a secure and tamper-proof way of recording votes, increasing trust in the electoral process. Additionally, blockchain is being used for digital identity verification, allowing individuals to prove their identity without revealing sensitive information. As blockchain technology continues to advance, its applications are expected to grow, leading to more secure and transparent systems across various industries.',
                'theme_id' => 3,
                'user_id' => 5,
                'status' => 'published',
                'image' => 'articles/blockchain.jpg',
            ],
            [
                'title' => 'The Importance of Data Encryption',
                'content' => 'Data encryption is a critical component of cybersecurity, ensuring that sensitive information remains secure during transmission and storage. Encryption involves converting data into a code that can only be deciphered with the correct key, making it unreadable to unauthorized users. This is particularly important for protecting sensitive information, such as financial data, personal information, and corporate secrets. Encryption is used in a wide range of applications, from securing online transactions to protecting data stored on devices. For example, when you make a purchase online, encryption ensures that your credit card information is transmitted securely. Similarly, encryption is used to protect data stored on smartphones, laptops, and other devices, ensuring that it cannot be accessed if the device is lost or stolen. As cybersecurity threats continue to evolve, the importance of data encryption cannot be overstated. Implementing strong encryption practices is essential to protecting sensitive information and maintaining digital security.',
                'theme_id' => 3,
                'user_id' => 6,
                'status' => 'published',
                'image' => 'articles/DataEncryption.jpg',
            ],
            [
                'title' => 'Cybersecurity in the Cloud',
                'content' => 'As more businesses move to the cloud, cybersecurity becomes a top priority. Cloud computing offers many benefits, such as scalability, flexibility, and cost savings, but it also introduces new security challenges. For example, storing data in the cloud means that it is accessible from anywhere, which increases the risk of unauthorized access. Additionally, cloud environments are often shared among multiple users, which can create vulnerabilities if not properly managed. To address these challenges, businesses must adopt a proactive approach to cloud security. This includes implementing strong access controls, encrypting data, and regularly monitoring for suspicious activity. Additionally, businesses should work with cloud service providers that prioritize security and offer robust security features. As cloud computing continues to grow, staying informed about the latest security threats and best practices is crucial to protecting sensitive information and maintaining digital security.',
                'theme_id' => 3,
                'user_id' => 7,
                'status' => 'approved',
                'image' => 'articles/Cybersecurity-theCloud.jpg',
            ],
            [
                'title' => 'The Role of AI in Cybersecurity',
                'content' => 'Artificial Intelligence (AI) is being used to enhance cybersecurity by detecting threats, analyzing patterns, and responding to attacks in real-time. AI-powered systems can analyze vast amounts of data to identify potential threats, such as malware, phishing attempts, and unauthorized access. For example, machine learning algorithms can detect patterns in network traffic that indicate a potential attack, allowing cybersecurity teams to take preventive actions. Additionally, AI is being used to automate responses to cyber threats, such as blocking malicious IP addresses or isolating infected devices. AI is also being used to improve threat intelligence by analyzing data from multiple sources and identifying emerging threats. As cyber threats continue to evolve, the role of AI in cybersecurity is expected to grow, leading to more effective and efficient security measures.',
                'theme_id' => 3,
                'user_id' => 8,
                'status' => 'approved',
                'image' => 'articles/AI-Cybersecurity.jpeg',
            ],
            [
                'title' => 'Cybersecurity for Small Businesses',
                'content' => 'Small businesses are increasingly targeted by cybercriminals, making cybersecurity a top priority. Small businesses often have limited resources, which can make them more vulnerable to cyber attacks. However, there are several affordable and effective cybersecurity measures that small businesses can implement to protect themselves. For example, using strong passwords and multi-factor authentication can help prevent unauthorized access to sensitive information. Regularly updating software and systems can also reduce the risk of vulnerabilities being exploited. Additionally, small businesses should invest in cybersecurity training for employees to help them recognize and respond to potential threats. Implementing a backup and recovery plan is also crucial to ensuring that data can be restored in the event of a cyber attack. As cyber threats continue to evolve, small businesses must stay informed about the latest security threats and best practices to protect their sensitive information and maintain digital security.',
                'theme_id' => 3,
                'user_id' => 9,
                'status' => 'published',
                'image' => 'articles/Cybersecurity-SmallBusinesses.jpg',
            ],
            [
                'title' => 'The Future of Cybersecurity',
                'content' => 'As cyber threats evolve, so must our defenses. The future of cybersecurity will involve emerging technologies, such as quantum encryption and zero-trust architectures, to address increasingly sophisticated threats. Quantum encryption, which uses the principles of quantum mechanics to secure data, promises to provide unbreakable encryption, making it ideal for protecting sensitive information. Zero-trust architectures, which assume that no user or device can be trusted by default, are becoming increasingly popular as a way to prevent unauthorized access to networks and systems. Additionally, AI and machine learning will continue to play a crucial role in cybersecurity by detecting and responding to threats in real-time. As the cybersecurity landscape continues to evolve, staying informed about the latest technologies and best practices will be crucial to protecting sensitive information and maintaining digital security.',
                'theme_id' => 3,
                'user_id' => 10,
                'status' => 'approved',
                'image' => 'articles/FutureCybersecurity.jpg',
            ],

            // Theme 4: Virtual Reality
            [
                'title' => 'The Rise of Quantum Computing',
                'content' => 'Quantum computing promises to revolutionize problem-solving across various industries, from cryptography to drug discovery. Unlike classical computers, which use bits to represent information as either 0 or 1, quantum computers use quantum bits, or qubits, which can represent both 0 and 1 simultaneously. This allows quantum computers to perform complex calculations at speeds that are impossible for classical computers. For example, quantum computers can solve complex optimization problems, such as finding the most efficient route for a delivery truck or optimizing a financial portfolio. Additionally, quantum computing has the potential to revolutionize cryptography by breaking current encryption methods and creating new, unbreakable ones. In the field of drug discovery, quantum computers can simulate molecular interactions at an unprecedented level of detail, accelerating the development of new drugs. As quantum computing technology continues to advance, its applications are expected to grow, leading to breakthroughs in various fields.',
                'theme_id' => 4,
                'user_id' => 4,
                'status' => 'published',
                'image' => 'articles/quantum-computing.jpg',
            ],
            [
                'title' => 'Exploring the Metaverse: Opportunities and Challenges',
                'content' => 'The metaverse offers vast potential for social interaction, entertainment, and business, but it also brings challenges in terms of security, privacy, and accessibility. The metaverse is a virtual world where users can interact with each other and digital objects in real-time. It has the potential to revolutionize industries such as gaming, education, and retail by providing immersive and interactive experiences. For example, in the gaming industry, the metaverse can create virtual worlds where players can explore, interact, and compete with each other. In education, the metaverse can provide immersive learning experiences, such as virtual field trips and interactive lessons. However, the metaverse also raises significant challenges, such as ensuring the security and privacy of users’ data and addressing issues of accessibility and inclusivity. As the metaverse continues to evolve, it will be crucial to address these challenges to ensure that it benefits society as a whole.',
                'theme_id' => 4,
                'user_id' => 7,
                'status' => 'published',
                'image' => 'articles/metaverse.jpg',
            ],
            [
                'title' => 'Virtual Reality in Education',
                'content' => 'Virtual Reality (VR) is transforming education by providing immersive learning experiences. VR allows students to explore historical sites, conduct virtual experiments, and engage in interactive lessons, making learning more engaging and effective. For example, students can take virtual field trips to ancient civilizations or explore the human body in 3D, gaining a deeper understanding of the subject matter. Additionally, VR is being used to train students in fields such as medicine and engineering, where hands-on experience is crucial. For example, medical students can practice surgical procedures in a virtual environment, reducing the risk of errors in real-life situations. As VR technology continues to advance, its applications in education are expected to grow, leading to more personalized and effective learning experiences for students of all ages.',
                'theme_id' => 4,
                'user_id' => 8,
                'status' => 'approved',
                'image' => 'articles/Virtual-Reality-Education.jpg',
            ],
            [
                'title' => 'Virtual Reality in Healthcare',
                'content' => 'Virtual Reality (VR) is being used in healthcare for medical training, patient therapy, and surgical simulations. VR provides a safe and controlled environment for medical professionals to practice procedures and improve their skills. For example, surgeons can use VR to simulate complex surgeries, allowing them to practice and refine their techniques before performing them on real patients. Additionally, VR is being used for patient therapy, such as treating phobias, PTSD, and chronic pain. For example, patients with a fear of heights can use VR to gradually expose themselves to heights in a controlled environment, helping them overcome their fear. VR is also being used to improve patient outcomes by providing immersive and interactive rehabilitation exercises. As VR technology continues to advance, its applications in healthcare are expected to grow, leading to better patient care and improved outcomes.',
                'theme_id' => 4,
                'user_id' => 9,
                'status' => 'approved',
                'image' => 'articles/Virtual-Reality-Healthcare.jpeg',
            ],
            [
                'title' => 'The Role of Data Science in Healthcare',
                'content' => 'Data science is playing a crucial role in improving patient care and treatment outcomes. By analyzing large datasets, healthcare providers can make more informed decisions and develop personalized treatment plans. For example, data science can be used to analyze patient records and identify patterns that indicate a higher risk of certain diseases. This information can be used to develop preventive measures and early intervention strategies. Additionally, data science is being used to improve the efficiency of healthcare operations, such as optimizing hospital workflows and reducing wait times. Data science is also being used in drug discovery, where it can analyze vast amounts of data to identify potential drug candidates and predict their effectiveness. As data science continues to evolve, its applications in healthcare are expected to grow, leading to better patient outcomes and more efficient healthcare delivery.',
                'theme_id' => 4,
                'user_id' => 10,
                'status' => 'published',
                'image' => 'articles/data-science-healthcare.jpg',
            ],
            [
                'title' => 'Virtual Reality in Gaming',
                'content' => 'Virtual Reality (VR) is revolutionizing the gaming industry by providing immersive and interactive experiences. VR allows gamers to step into virtual worlds and interact with their environments like never before. For example, VR games can simulate real-world activities, such as driving, flying, or exploring, providing a level of immersion that is impossible with traditional games. Additionally, VR is being used to create social gaming experiences, where players can interact with each other in virtual environments. As VR technology continues to advance, its applications in gaming are expected to grow, leading to more realistic and engaging gaming experiences.',
                'theme_id' => 4,
                'user_id' => 11,
                'status' => 'published',
                'image' => 'articles/Virtual-Reality-Gaming.jpg',
            ],
            [
                'title' => 'Virtual Reality in Real Estate',
                'content' => 'Virtual Reality (VR) is transforming the real estate industry by allowing potential buyers to take virtual tours of properties. VR provides a realistic and immersive experience, allowing buyers to explore properties from the comfort of their own homes. For example, buyers can use VR to walk through a property, view different rooms, and get a sense of the layout and design. This technology is particularly useful for buyers who are unable to visit properties in person, such as those relocating to a new city or country. Additionally, VR is being used to showcase properties that are still under construction, allowing buyers to visualize the finished product. As VR technology continues to advance, its applications in real estate are expected to grow, leading to more efficient and convenient property transactions.',
                'theme_id' => 4,
                'user_id' => 2,
                'status' => 'approved',
                'image' => 'articles/Virtual-RealityRealEstate.jpg',
            ],
        ];

        foreach ($articles as $articleData) { 
            $article = Article::create($articleData);
            
            if ($articleData['status'] === 'published') { 
                $article->update([
                    'published_at' => now()
                ]);
            }
        }
    }
}
