1. Build containers: docker-compose -f docker/docker-compose.yml -p x-project up -d

2. Go into php container: docker exec -ti xproject_php_1 bash

3. Set up laravel: laravel new

4. Create DNS lookup in /etc/hosts ex. 127.0.0.1 x-project.com

5. Home page available on: x-project.com:8080

6. Run from php container: npm install