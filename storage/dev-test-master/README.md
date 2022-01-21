Coding Test Instructions
========================

The purpose of this test is to determine your ability to learn quickly, analyze
problems, and produce logic to solve these problems. We will also be looking at
code readability and cleanliness.

In this package
---------------

You'll find a sample data set in the form of a MySQL database dump or seperated as individual json files, for your convenience.

This test set also includes example output in the form of an HTML page:
index.html.

Problem
-------

Your task is to use the data provided and implement some sort of application using a framwork of your choice.  You may set up 
the backend using AWS API Gateway or web framework (Larvel/React.js/Vue.js) to output the data in a format that matches the 
HTML in index.html. Your solution should accept any data set like the one provided, so it must allow any
number of skills per person, any number of jobs, and any number of applicants.

Please feel free to ask questions: jesse@fashionphile.com.

Additional Info
---------------

The following is a summary of the data provided.

#### Job

* Columns:
  * id: integer
  * name: string (e.g. Web Developer)

#### Applicant

* Columns:
  * id: integer
  * name: string
  * email: string
  * website: string
  * cover_letter: text
  * job_id: integer
* Relationships:
  * has one job
  * has many skills

#### Skill

* Columns:
  * id: integer
  * name: string
  * applicant_id: integer

