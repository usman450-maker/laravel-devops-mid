pipeline {
    agent any

    environment {
        COMPOSE_PROJECT_NAME = 'laravel-app'
    }

    stages {
        stage('Checkout Code') {
            steps {
                checkout scm
                echo 'GitHub code downloaded successfully.'
            }
        }

        stage('Prepare Environment') {
            steps {
                sh '''
                    set -eu

                    if [ ! -f .env ]; then
                        cp .env.example .env
                    fi

                    if ! grep -q '^APP_KEY=base64:' .env; then
                        KEY=$(php -r 'echo "base64:".base64_encode(random_bytes(32));')

                        if grep -q '^APP_KEY=' .env; then
                            sed -i "s|^APP_KEY=.*|APP_KEY=$KEY|" .env
                        else
                            echo "APP_KEY=$KEY" >> .env
                        fi
                    fi

                    echo "Laravel environment prepared."
                '''
            }
        }

        stage('Build Docker Image') {
            steps {
                sh 'docker compose build app'
            }
        }

        stage('Deploy Application') {
            steps {
                sh '''
                    docker compose up -d
                    docker compose exec -T app php artisan migrate --force
                '''
            }
        }

        stage('Verify Deployment') {
            steps {
                sh '''
                    docker compose ps
                    curl --fail --silent --show-error \
                        http://localhost:8000/ \
                        --output /dev/null
                '''

                echo 'Laravel deployment verified successfully!'
            }
        }
    }

    post {
        success {
            echo 'CI/CD pipeline completed successfully!'
        }

        failure {
            echo 'Pipeline failed. Check Console Output for details.'
        }
    }
}
