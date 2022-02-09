-- create and select the database 
DROP DATABASE IF EXISTS cal_sched_system_database;
CREATE DATABASE cal_sched_system_database;
USE cal_sched_system_database;  


--  ------------- creating TABLES -------------


-- create project_director
CREATE TABLE project_director (
 director_id		INT(11)			NOT NULL	AUTO_INCREMENT,
 director_f_name	VARCHAR(255)	NOT NULL,
 director_l_name	VARCHAR(255)	NOT NULL,
 PRIMARY KEY (director_id)
);

-- create projects table
CREATE TABLE projects (
 project_id				INT(11)			NOT NULL	AUTO_INCREMENT,
 director_id			INT(11)			NOT NULL,
 project_name			VARCHAR(255)	NOT NULL,
 personnel_cost			DECIMAL(10,2)	NOT NULL,
 project_start_date		DATE		    NOT NULL,
 project_description	VARCHAR(1000)	NOT NULL,
 project_end_date		DATE		    NOT NULL,
 project_complete		BOOLEAN			NOT NULL,
 PRIMARY KEY (project_id),
 FOREIGN KEY (director_id) REFERENCES project_director (director_id)
);



-- create project_phases
CREATE TABLE project_phases (
 project_phase_id		INT(11)			NOT NULL	AUTO_INCREMENT,
 phase_name				VARCHAR(255)	NOT NULL,
 PRIMARY KEY (project_phase_id)
);



-- create project_phases_to_projects
CREATE TABLE project_phases_to_projects (
 project_phase_id		INT(11)			NOT NULL,
 project_id				INT(11)			NOT NULL,
 PRIMARY KEY (project_phase_id, project_id),
 FOREIGN KEY (project_phase_id) REFERENCES project_phases (project_phase_id),
 FOREIGN KEY (project_id) REFERENCES projects (project_id)
);



-- create teams
CREATE TABLE teams (
 teams_id			INT(11)			NOT NULL	AUTO_INCREMENT,
 project_id			INT(11)			NOT NULL,
 director_id		INT(11)			NOT NULL,
 team_name			VARCHAR(255)	NOT NULL,
 PRIMARY KEY (teams_id),
 FOREIGN KEY (project_id) REFERENCES projects (project_id),
 FOREIGN KEY (director_id) REFERENCES project_director (director_id)
);



-- create skills
CREATE TABLE skills (
 skills_id				INT(11)			NOT NULL	AUTO_INCREMENT,
 skill_name				VARCHAR(255)	NOT NULL,
 PRIMARY KEY (skills_id)
);



-- create roles
CREATE TABLE roles (
 role_id				INT(11)			NOT NULL	AUTO_INCREMENT,
 team_lead_id		 	INT(11)			NOT NULL,
 role_description		VARCHAR(1000)	NOT NULL,
 PRIMARY KEY (role_id)
);



-- create team_member
CREATE TABLE team_member (
 team_member_id				INT(11)			NOT NULL	AUTO_INCREMENT,
 role_id		 			INT(11)			NOT NULL,
 member_f_name				VARCHAR(255)	NOT NULL,
 member_l_name				VARCHAR(255)	NOT NULL,
 PRIMARY KEY (team_member_id),
 FOREIGN KEY (role_id) REFERENCES roles (role_id)
);


-- create user
CREATE TABLE user (
    user_id         INT(11)         NOT NULL    AUTO_INCREMENT,         
    username        VARCHAR(255)    NOT NULL,
    password        VARCHAR(60),
    director_id     INT(11),
    team_member_id  INT(11),
    PRIMARY KEY (user_id),
    FOREIGN KEY (director_id) REFERENCES project_director (director_id),
    FOREIGN KEY (team_member_id) REFERENCES team_member (team_member_id)
);


-- create skills_to_members
CREATE TABLE skills_to_members (
 skills_id				INT(11)			NOT NULL,
 team_member_id			INT(11)			NOT NULL,
 -- teams_id				INT(11),
 PRIMARY KEY (skills_id, team_member_id),
 FOREIGN KEY (skills_id) REFERENCES skills (skills_id),
 FOREIGN KEY (team_member_id) REFERENCES team_member (team_member_id)
 -- FOREIGN KEY (teams_id) REFERENCES teams (teams_id)
);



-- create tasks
CREATE TABLE tasks (
 task_id				INT(11)			NOT NULL	AUTO_INCREMENT,
 task_name				VARCHAR(255)	NOT NULL,
 PRIMARY KEY (task_id)
);



-- create team_member_assignment
CREATE TABLE team_member_assignment (
 team_assignment_id				INT(11)			NOT NULL	AUTO_INCREMENT,
 team_member_id					INT(11)			NOT NULL,
 teams_id						INT(11)			NOT NULL,
 task_id						INT(11)			NOT NULL,
 PRIMARY KEY (team_assignment_id),
 FOREIGN KEY (team_member_id) REFERENCES team_member (team_member_id),
 FOREIGN KEY (teams_id) REFERENCES teams (teams_id),
 FOREIGN KEY (task_id) REFERENCES tasks (task_id)
);

-- create tasks_to_projects
CREATE TABLE tasks_to_projects (
 task_id						INT(11)			NOT NULL,
 project_id						INT(11)			NOT NULl,
 task_completed					BOOLEAN			NOT NULL,
 task_not_started				BOOLEAN			NOT NULL,
 task_in_progress				BOOLEAN			NOT NULL,
 PRIMARY KEY (task_id, project_id),
 FOREIGN KEY (task_id) REFERENCES tasks (task_id),
 FOREIGN KEY (project_id) REFERENCES projects (project_id)
);

-- INSERT Statements
INSERT INTO project_director
(
	director_f_name	,
	director_l_name	
)
VALUES
(
	'David', 
	'Copperfield'
);


INSERT INTO projects
(
	director_id				,
	project_name			,
	personnel_cost			,
	project_start_date		,
	project_description		,
	project_end_date		,
	project_complete		
)
VALUES
(
	1,
	'Procuratio', 
	64400.00, 
	STR_TO_DATE('September 12, 2021', '%M %d, %Y'),
	'lorem ipsum dolor sit amet consertetur adipiscing elit Nunc maximus nulla ut commodo sagittis sapien dui mattis dui non pulvinar loren felis nec erat',
	STR_TO_DATE('May 12, 2022', '%M %d, %Y'), 
	0
);

/******************************/
INSERT INTO project_phases
(
	phase_name			
)
VALUES
(
	'Planning'
);

/******************************/
INSERT INTO project_phases_to_projects
(
	project_phase_id	,
	project_id			
)
VALUES
(
	1, 
	1
);

/*****************************
INSERT INTO teams
(
	team_name	
)
VALUES
(
	"Procuratio"
);
*/
/******************************/
INSERT INTO skills
(
	skill_name	
)
VALUES
(
	'Screen Design'
);

/******************************/
INSERT INTO roles
(
	team_lead_id	,
	role_description	
)
VALUES
(
	1,
	'database admin'
);

/******************************/
INSERT INTO team_member
(
	role_id		,
	member_f_name		,
	member_l_name		
)
VALUES
(
	1,
	'Lewis', 
	'Carroll'
);

INSERT INTO user
(
	username	,
	password	
)
VALUES
(
	'admin',
	'dd94709528bb1c83d08f3088d4043f4742891f4f'
);

/******************************/
/*INSERT INTO skills_to_members
(
	skills_id		,
	team_member_id	,
	teams_id
)
VALUES
(
	1, 
	1, 
	1
);
*/
/******************************/
INSERT INTO tasks
(
	task_name	
)
VALUES
(
	'Context Diagram'
);

/******************************/
/*INSERT INTO team_member_assignment
(
	team_assignment_id		,
	team_member_ id			,
	teams_id			,
	task_id					
)
VALUES
(
	1, 
	1, 
	1, 
	1
);
*/

/******************************/
INSERT INTO tasks_to_projects
(
	task_id				,
	project_id			,
	task_completed		,
	task_not_started	,
	task_in_progress
)
VALUES
(
	1,
	1,
	0, 
	0, 
	1
);






















