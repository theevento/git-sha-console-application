# Git SHA console application
This is a very simple library to get last SHA commit from given repository name and branch name
## Support services:
* GitHub
## Install
* Clone repository:

`
   git clone https://github.com/theevento/git-sha-console-application.git
`

* Install components via composer:

`
    composer install
`

## Usage
Default usage:

`
    php public/index.php git [<repository>] [<branch>] [--service=]
`

### Options:
* repository - name of owner and repository for example theevento/git-sha-console-application
* branch - name of branch from given repository name
* service - name of git service (default: github)


#### Example usage
`
    php public/index.php git theevento/git-sha-console-application master
`