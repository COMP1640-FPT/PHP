<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            '1' => [
                '1618' => [
                    'name' => 'Programming',
                    'description' => 'Subject Programming of Computing Major',
                ],
                '1619' => [
                    'name' => 'Networking',
                    'description' => 'Subject Networking of Computing Major',
                ],
                '1620' => [
                    'name' => 'Professional Practice',
                    'description' => 'Subject Professional Practice of Computing Major',
                ],
                '1622' => [
                    'name' => 'Database Design & Development',
                    'description' => 'Subject Database Design & Development of Computing Major'
                ],
                '1623' => [
                    'name' => 'Security',
                    'description' => 'Subject Security of Computing Major',
                ],
                '1625' => [
                    'name' => 'Managing a Successful Computing Project',
                    'description' => 'Subject Managing a Successful Computing Project of Computing Major',
                ],
                '1631' => [
                    'name' => 'Software Development Life Cycles',
                    'description' => 'Subject Software Development Life Cycles of Computing Major',
                ],
                '1633' => [
                    'name' => 'Website Design & Development',
                    'description' => 'Subject Website Design & Development of Computing Major',
                ],
                '1639' => [
                    'name' => 'Computing Research Project (2 parts)',
                    'description' => 'Subject Computing Research Project (2 parts) of Computing Major',
                ],
                '1641' => [
                    'name' => 'Business Intelligence',
                    'description' => 'Subject Business Intelligence of Computing Major',
                ],
                '1644' => [
                    'name' => 'Cloud Computing',
                    'description' => 'Subject Cloud Computing of Computing Major',
                ],
                '1649' => [
                    'name' => 'Data Structures and Algorithms',
                    'description' => 'Subject Data Structures and Algorithms of Computing Major',
                ],
                '1651' => [
                    'name' => 'Advanced Programming',
                    'description' => 'Subject Advanced Programming of Computing Major',
                ],
                '1690' => [
                    'name' => 'Internet of Things',
                    'description' => 'Subject Internet of Things of Computing Major',
                ],
                '1670' => [
                    'name' => 'Application Development',
                    'description' => 'Subject Application Development of Computing Major',
                ],
                'COMP1682' => [
                    'name' => 'Project',
                    'description' => 'Subject Project of Computing Major',
                ],
                'COMP1640' => [
                    'name' => 'Enterprise Web Software Development',
                    'description' => 'Subject Enterprise Web Software Development of Computing Major',
                ],
                'COMP1649' => [
                    'name' => 'Human Computer and Interaction Design',
                    'description' => 'Subject Human Computer and Interaction Design of Computing Major',
                ],
                'COMP1787' => [
                    'name' => 'Requirement Management',
                    'description' => 'Subject Requirement Management of Computing Major',
                ],
                'COMP1786' => [
                    'name' => 'Mobile Application Design and Development',
                    'description' => 'Subject Mobile Application Design and Development of Computing Major',
                ],
            ],
            '2' => [
                '3512' => [
                    'name' => 'Professional Development',
                    'description' => 'Subject Professional Development of Graphic Design Major',
                ],
                '3513' => [
                    'name' => 'Contextual Studies',
                    'description' => 'Subject Contextual Studies of Graphic Design Major',
                ],
                '3541' => [
                    'name' => 'Visual Narratives',
                    'description' => 'Subject Visual Narratives of Graphic Design Major',
                ],
                '3515' => [
                    'name' => 'Techniques & Processes',
                    'description' => 'Subject Techniques & Processes of Graphic Design Major',
                ],
                '3524' => [
                    'name' => 'Typography',
                    'description' => 'Subject Typography of Graphic Design Major',
                ],
                '3532' => [
                    'name' => 'Printmaking',
                    'description' => 'Subject Printmaking of Graphic Design Major',
                ],
                '3514' => [
                    'name' => 'Individual Project',
                    'description' => 'Subject Individual Project of Graphic Design Major',
                ],
                '3525' => [
                    'name' => 'Graphic Design Practices',
                    'description' => 'Subject Graphic Design Practices of Graphic Design Major',
                ],
                '3562' => [
                    'name' => 'Art Direction',
                    'description' => 'Subject Art Direction of Graphic Design Major',
                ],
                '3559' => [
                    'name' => 'Branding & Identity',
                    'description' => 'Subject Branding & Identity of Graphic Design Major',
                ],
                '3596' => [
                    'name' => 'Digital Animation',
                    'description' => 'Subject Digital Animation of Graphic Design Major',
                ],
                '3544' => [
                    'name' => 'Applied Practice-Collaborative Project',
                    'description' => 'Subject Programming of Graphic Design Major',
                ],
                '3542' => [
                    'name' => 'Professional Practice',
                    'description' => 'Subject Professional Practice of Graphic Design Major',
                ],
                '3550' => [
                    'name' => 'Advanced Graphic Design Studies',
                    'description' => 'Subject Advanced Graphic Design Studies of Graphic Design Major',
                ],
                'DESI1222' => [
                    'name' => 'Interdisciplinary Design',
                    'description' => 'Subject Interdisciplinary Design of Graphic Design Major',
                ],
                'DESI1221' => [
                    'name' => 'Professional Practice & Portfolio',
                    'description' => 'Subject Professional Practice & Portfolio of Graphic Design Major',
                ],
                'DESI1226' => [
                    'name' => 'Experience Design',
                    'description' => 'Subject Experience Design of Graphic Design Major',
                ],
                'DESI1219' => [
                    'name' => 'Design Research Project',
                    'description' => 'Subject Design Research Project of Graphic Design Major',
                ],
            ],
            '3' => [
                '0485' => [
                    'name' => 'Business and the Business Environment',
                    'description' => 'Subject Business and the Business Environment of Computing Major',
                ],
                '0486' => [
                    'name' => 'Marketing Essentials',
                    'description' => 'Subject Marketing Essentials of Computing Major',
                ],
                '0487' => [
                    'name' => 'Human Resource Management',
                    'description' => 'Subject Human Resource Management of Computing Major',
                ],
                '0488' => [
                    'name' => 'Management and Operations',
                    'description' => 'Subject Management and Operations of Computing Major',
                ],
                '0489' => [
                    'name' => 'Management Accounting',
                    'description' => 'Subject Management Accounting of Computing Major',
                ],
                '0491' => [
                    'name' => 'Managing a sucessful Business Project',
                    'description' => 'Subject Managing a sucessful Business Project of Computing Major',
                ],
                '0736' => [
                    'name' => 'Business Law',
                    'description' => 'Subject Business Law of Computing Major',
                ],
                '0495' => [
                    'name' => 'Entrepreneurship and Small Business Management',
                    'description' => 'Subject Entrepreneurship and Small Business Management of Computing Major',
                ],
                '0522' => [
                    'name' => 'Research Project',
                    'description' => 'Subject Research Project of Computing Major',
                ],
                '0525' => [
                    'name' => 'Organizations and Behaviour',
                    'description' => 'Subject Organizations and Behaviour of Computing Major',
                ],
                '0570' => [
                    'name' => 'Statistics for Management',
                    'description' => 'Subject Statistics for Management of Computing Major',
                ],
                '0574' => [
                    'name' => 'Business Strategy',
                    'description' => 'Subject Business Strategy of Computing Major',
                ],
                '0528' => [
                    'name' => 'Operations and Project Management',
                    'description' => 'Subject Operations and Project Management of Computing Major',
                ],
                '0529' => [
                    'name' => 'Understanding and Leading Change',
                    'description' => 'Subject Understanding and Leading Change of Computing Major',
                ],
                '0530' => [
                    'name' => 'Global Business Environment',
                    'description' => 'Subject Global Business Environment of Computing Major',
                ],
                'BUSI1323' => [
                    'name' => 'Leadership in Organizations',
                    'description' => 'Subject Leadership in Organizations of Computing Major',
                ],
                'BUSI1334' => [
                    'name' => 'Career and Professional Practice',
                    'description' => 'Subject Career and Professional Practice of Computing Major',
                ],
                'BUSI1633' => [
                    'name' => 'Strategy for Managers',
                    'description' => 'Subject Strategy for Managers of Computing Major',
                ],
                'BUSI1475' => [
                    'name' => 'Management in Critical Context',
                    'description' => 'Subject Management in Critical Context of Computing Major',
                ],
                'BUSI0011' => [
                    'name' => 'Dissertation',
                    'description' => 'Subject Dissertation of Computing Major',
                ],
                'INDU1130' => [
                    'name' => 'International Human Resource Management',
                    'description' => 'Subject International Human Resource Management of Computing Major',
                ],
            ],
        ];
        foreach ($subjects as $majorId => $subject) {
            foreach ($subject as $code => $detail) {
                DB::table('subjects')->insert([
                    'name' => $detail['name'],
                    'code' => $code,
                    'description' => $detail['description'],
                    'major_id' => $majorId,
                    'updated_at' => Carbon::now(),
                    'created_at' => Carbon::now(),
                ]);
            }
        }
    }
}
