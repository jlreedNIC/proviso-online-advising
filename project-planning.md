# Project Overview

This document is intended to give an overview of what the project will require as well as the database layout.

## Course Requirements

**Description:** It has been long known that academic advising is a vital component of college students' academic 
success which assures institutional commitment to them, increases academic integrity, helps reduce attrition 
rates,  improves  GPA,  results  in  higher  student  satisfaction  and  makes  students  feel  valued.  Advising  is 
essentially personalized and helps maintain a trusted relationship between an institution and a student through 
the adviser in an intimate way. This relationship and the benefits it embody becomes valuable only when both 
the advisor and the student are well informed about the choices they make together about the student's future. 
However, curricular advising takes up a significant amount of time for both students and faculty. Given the 
prerequisite graph of courses, and one's career goals, the course selections every semester should be almost 
deterministic. Yet, no great tools exist to advise students automatically. In this project, we explore the design 
and implementation of such an advising system that can serve as a blue-print for a smart advising system. Our 
goal is to design a smart advising system that can accommodate career goals into the program planning.
Your system must include the following features, and all the source code should be hosted on GitHub with 
proper documentation and shared with the instructor:
1. A graphical user interface for students and advisor using which they can plan course selections. (30%)
2. The concept of career graphs, course hierarchy, qualification to course mapper, and course suggestion 
graph will need to be implemented. (30%)
3. The eye-catching visual interfaces must be implemented for visualizing all the graphs. (30%)
4. Host the system on a server using a web interface for both the admins and the users.

## Tools
-HTML
-JavaScript/libraries
-CSS
-Apache mysql

## Developement plan

- user login (implement if time)
- dashboard
  - shows current degree (and degree progress)
  - shows current course map
  - if career object has been set up, show that
  - show future plan if set up
- set up future plan
  - load/choose career objective
    - load skills needed for objective
    - load skills to map to courses to take
  - show what courses are needed to obtain career objective
    - ie CS360 gives SQL, PHP, front-end skills
    - show in order of pre-reqs
  - give general course plan (if time)
  - plan course schedule (implement if time)
    - this includes planning with university schedule (ie times and instructors)
    
## Table Layout

user table
    userID (primary key)
    first_name
    last_name
    grade
    user_name (ie reed5204)
    password
    degree (foreign key)

courses table
    courseID (primary key)
    course_name
    dept (ie computer science)
    course number (150 from CS150)
    credits

skills table
    skillID (primary key)
    name (ie java)
    class (ie high level programming language)

career table
    careerID (primary key)
    name
    pay
    company
    position_level (ie entry level, management etc)

### RELATIONSHIP TABLES
taken (user, courses)
    userID
    courseID

will_take (user, courses)
    userID
    courseID

course_skills (skills, courses)
    courseID
    skillID

career_skills (skills, careers)
    careerID
    skillID

prereqs (course to course)
    courseID
    requires_courseID

### Degree Requirement Tables

degrees
    degreeID (primary key)
    degree_name
    degree_level
    description

categories
    catID (primary key)
    category (ie humanities, or natural science)

degree_classes_req
    degreeID (foreign key)
    courseID (foreign key)

degree_min_grade_reg
    degreeID (foreign key)
    courseID (foreign key)
    grade
lists courses that a degree requires a minimum grade in (most likely a C or better)

degree_category_requirements
    degreeID (foreign key)
    category (foreign key)
    credits_required

degree_category_accepted_courses
    degreeID (foreign key)
    categoryID (foreign key)
    accepted_courses (foreign key)

## Our skills 
-Knowledge of C, C#, C++, some HTML 5. 

## Skills Needed
-Mysql, javascript, HTML 5, CSS.

## Timeline
Week 1: Setup github, html template, mysql server.
Week 2: Setup javascript libraries, and basic html design for course registration.
Week 3: Start on career graphs using javascript, and continue with html basic html design for course registration/student dashboard. 
Week 4: Start adding mysql databases and generating data with graphs/html ui. 
