<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate( ['email' => 'admin@blogsystem.com'], [ 'name' => 'Admin', 'password' => Hash::make('admin123'), 'is_admin' => true, ] );

        // Seed sample blogs
        $blogs = [
            [
                'title' => 'UPSC CSE 2024 Admit Card Released',
                'short_description' => 'The Union Public Service Commission has released the admit card for the Civil Services Examination 2024. Candidates can download their hall ticket from the official website.',
                'content' => '<h2>UPSC CSE 2024 Admit Card</h2><p>The <strong>Union Public Service Commission (UPSC)</strong> has officially released the admit card for the Civil Services Examination (CSE) 2024.</p><h3>How to Download</h3><ul><li>Visit the official UPSC website</li><li>Click on the "Admit Card" section</li><li>Enter your registration number and date of birth</li><li>Download and print your admit card</li></ul><h3>Important Dates</h3><table border="1" cellpadding="8" cellspacing="0" style="width:100%;border-collapse:collapse;"><thead><tr style="background-color:#f0f0f0;"><th>Event</th><th>Date</th></tr></thead><tbody><tr><td>Admit Card Release</td><td>January 15, 2024</td></tr><tr><td>Examination Date</td><td>February 4, 2024</td></tr></tbody></table>',
                'category' => 'Admit Card',
            ],
            [
                'title' => 'SSC CHSL Answer Key 2024 Out',
                'short_description' => 'Staff Selection Commission has published the official answer key for CHSL Tier-1 examination 2024. Candidates can raise objections till the deadline.',
                'content' => '<h2>SSC CHSL Answer Key 2024</h2><p>The <strong>Staff Selection Commission (SSC)</strong> has released the official answer key for the Combined Higher Secondary Level (CHSL) Tier-1 Examination 2024.</p><h3>Steps to Check Answer Key</h3><ol><li>Go to the SSC official website</li><li>Navigate to the Answer Key section</li><li>Select CHSL 2024 Tier-1</li><li>Download the answer key PDF</li></ol><p style="color:#c0392b;"><strong>Note:</strong> Candidates who disagree with any answer can raise objections by paying the prescribed fee.</p>',
                'category' => 'Answer Key',
            ],
            [
                'title' => 'Railway RRB NTPC Exam Calendar 2024',
                'short_description' => 'Railway Recruitment Board has released the exam calendar for NTPC recruitment 2024. Check all important dates for written test, document verification, and medical examination.',
                'content' => '<h2>RRB NTPC Exam Calendar 2024</h2><p>The <strong>Railway Recruitment Board (RRB)</strong> has officially announced the complete exam calendar for the Non-Technical Popular Categories (NTPC) recruitment 2024.</p><h3>Exam Schedule</h3><table border="1" cellpadding="8" cellspacing="0" style="width:100%;border-collapse:collapse;"><thead><tr style="background-color:#e8f4f8;"><th>Stage</th><th>Date</th><th>Mode</th></tr></thead><tbody><tr><td>CBT Stage 1</td><td>March 2024</td><td>Online</td></tr><tr><td>CBT Stage 2</td><td>June 2024</td><td>Online</td></tr><tr><td>Document Verification</td><td>September 2024</td><td>Offline</td></tr></tbody></table>',
                'category' => 'Calendar',
            ],
            [
                'title' => 'IBPS PO 2024 Exam Date Announced',
                'short_description' => 'The Institute of Banking Personnel Selection has announced the exam dates for IBPS PO 2024. Preliminary exam will be held in October 2024.',
                'content' => '<h2>IBPS PO 2024 Exam Date</h2><p>The <strong>Institute of Banking Personnel Selection (IBPS)</strong> has officially announced the examination dates for the Probationary Officer (PO) recruitment 2024.</p><h3>Important Dates</h3><ul><li><strong>Notification Release:</strong> August 2024</li><li><strong>Online Application:</strong> August - September 2024</li><li><strong>Preliminary Exam:</strong> October 2024</li><li><strong>Mains Exam:</strong> November 2024</li></ul><h3>Eligibility</h3><p>Candidates must have a graduation degree from a recognized university. Age limit is 20-30 years.</p>',
                'category' => 'Exam Date Information',
            ],
            [
                'title' => 'NEET UG 2024 Result Declared',
                'short_description' => 'National Testing Agency has declared the NEET UG 2024 results. Candidates who appeared in the examination can check their results on the official website.',
                'content' => '<h2>NEET UG 2024 Result</h2><p>The <strong>National Testing Agency (NTA)</strong> has officially declared the NEET UG 2024 results. Candidates can now check their scores and rank on the official website.</p><h3>How to Check Result</h3><ol><li>Visit the official NTA website</li><li>Click on "NEET UG 2024 Result"</li><li>Enter Application Number and Date of Birth</li><li>Submit and view your result</li></ol><p style="background-color:#d4edda; padding:10px; border-radius:4px;">This year, <strong>over 20 lakh students</strong> appeared for the examination across various centers in India.</p>',
                'category' => 'Answer Key',
            ],
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'title' => $blog['title'],
                'slug' => Str::slug($blog['title']) . '-' . rand(1000, 9999),
                'short_description' => $blog['short_description'],
                'content' => $blog['content'],
                'category' => $blog['category'],
                'image_path' => null,
            ]);
        }
    }
}
