# Contributing

When contributing to this repository, please discuss via issue and follow the code of conduct.

## Table of Contents
1. [Code of Conduct](#Code-of-Conduct)
2. [Issues](#Issues)
3. [Pull Request](#Pull-Request)
4. [Commit chart](#Commit-chart)
5. [Definition of Done](#Definition-of-Done)

## Code of Conduct

#### Our Pledge

In the interest of fostering an open and welcoming environment, we as
contributors and maintainers pledge to making participation in our project and
our community a harassment-free experience for everyone, regardless of age, body
size, disability, ethnicity, gender identity and expression, level of experience,
nationality, personal appearance, race, religion, or sexual identity and
orientation.

#### Our Standards

Examples of behavior that contributes to creating a positive environment
include:

* Using welcoming and inclusive language
* Being respectful of differing viewpoints and experiences
* Gracefully accepting constructive criticism
* Focusing on what is best for the community
* Showing empathy towards other community members

Examples of unacceptable behavior by participants include:

* The use of sexualized language or imagery and unwelcome sexual attention or
advances
* Trolling, insulting/derogatory comments, and personal or political attacks
* Public or private harassment
* Publishing others' private information, such as a physical or electronic
  address, without explicit permission
* Other conduct which could reasonably be considered inappropriate in a
  professional setting

#### Our Responsibilities

Project maintainers are responsible for clarifying the standards of acceptable
behavior and are expected to take appropriate and fair corrective action in
response to any instances of unacceptable behavior.

Project maintainers have the right and responsibility to remove, edit, or
reject comments, commits, code, wiki edits, issues, and other contributions
that are not aligned to this Code of Conduct, or to ban temporarily or
permanently any contributor for other behaviors that they deem inappropriate,
threatening, offensive, or harmful.

#### Scope

This Code of Conduct applies both within project spaces and in public spaces
when an individual is representing the project or its community. Examples of
representing a project or community include using an official project e-mail
address, posting via an official social media account, or acting as an appointed
representative at an online or offline event. Representation of a project may be
further defined and clarified by project maintainers.

#### Enforcement

Instances of abusive, harassing, or otherwise unacceptable behavior may be
reported by contacting the project team at [INSERT EMAIL ADDRESS]. All
complaints will be reviewed and investigated and will result in a response that
is deemed necessary and appropriate to the circumstances. The project team is
obligated to maintain confidentiality with regard to the reporter of an incident.
Further details of specific enforcement policies may be posted separately.

Project maintainers who do not follow or enforce the Code of Conduct in good
faith may face temporary or permanent repercussions as determined by other
members of the project's leadership.

#### Attribution

This Code of Conduct is adapted from the [Contributor Covenant][homepage], version 1.4,
available at [http://contributor-covenant.org/version/1/4][version]

[homepage]: http://contributor-covenant.org
[version]: http://contributor-covenant.org/version/1/4/

## issues

Labels can help you find an issue you'd like to help with.

If you want to create a new one : We already have several issue template please choose the right one and contact us if you have any trouble to do so.

Issues are a place to discuss **don't hesitate to comment**.

> /!\ No development will be authorized without issue. /!\

## Pull Request

1. Every pull request are linked to one and only one issue.
2. Every pull request start from the master.
3. Follow the commit chart [Commit chart](#Commit-chart)
4. Follow the definition of done before merging [Definition of Done](#Definition-of-Done)

## Commit chart

- The message describe changes and their impacts.
- Associate to the issue with the number
- Commit often (at least one a day)

exemple `git commit -m "#8 Fixture : implement Alice Bundle"`

## Definition of Done

**Definition :** Ensemble des étapes et règles associées qu'une issue doit avoir subie pour la considérer comme Faite

| **Step** | **Rule** |**Details**|
| ------ | ------ | ------ |
| **1/ Your code respect PSR 1 & 2** | | |
| **2/ The modified code is covered by functional test** | | |
| **3/ Verify code quality** | | We are using **CodeClimate**|
| **4/ Verify code perform** | | We are using **BlackFire**|
| **5/ Update the README.md if needed** | | |
| **6/ Self review your code** | | It can prevent bugs to look at your entire work before continue |
| **7/ Peer review time** | Contact at least 2 contributors to review your PR, you'll need their approvals to merge the PR | **(include UX/UI)** |