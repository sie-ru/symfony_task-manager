<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420145044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, task_id INT DEFAULT NULL, user_id INT DEFAULT NULL, comment_text VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9474526C8DB60186 ON comment (task_id)');
        $this->addSql('CREATE INDEX IDX_9474526CA76ED395 ON comment (user_id)');
        $this->addSql('COMMENT ON COLUMN comment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "files" (id SERIAL NOT NULL, task_id INT DEFAULT NULL, file_path VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_63540598DB60186 ON "files" (task_id)');
        $this->addSql('CREATE TABLE "projects" (id SERIAL NOT NULL, project_name VARCHAR(255) NOT NULL, project_description VARCHAR(1000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5C93B3A467B2B61E ON "projects" (project_name)');
        $this->addSql('CREATE TABLE "roles" (id SERIAL NOT NULL, role_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE task_priority (id SERIAL NOT NULL, priority_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE task_status (id SERIAL NOT NULL, status_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE task_type (id SERIAL NOT NULL, type_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "tasks" (id SERIAL NOT NULL, project_id INT DEFAULT NULL, task_key VARCHAR(255) NOT NULL, task_title VARCHAR(255) NOT NULL, task_description VARCHAR(1500) DEFAULT NULL, is_completed BOOLEAN DEFAULT false NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, user_id INT NOT NULL, type_id INT NOT NULL, status_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_50586597E512532E ON "tasks" (task_key)');
        $this->addSql('CREATE INDEX IDX_50586597166D1F9C ON "tasks" (project_id)');
        $this->addSql('COMMENT ON COLUMN "tasks".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE "users" (id SERIAL NOT NULL, user_name VARCHAR(255) NOT NULL, user_password VARCHAR(255) NOT NULL, user_email VARCHAR(255) DEFAULT NULL, user_verified BOOLEAN DEFAULT false NOT NULL, user_image VARCHAR(255) DEFAULT NULL, telegram VARCHAR(255) DEFAULT NULL, role INT DEFAULT 1 NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E924A232CF ON "users" (user_name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9550872C ON "users" (user_email)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E943320DA ON "users" (telegram)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C8DB60186 FOREIGN KEY (task_id) REFERENCES "tasks" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "files" ADD CONSTRAINT FK_63540598DB60186 FOREIGN KEY (task_id) REFERENCES "tasks" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "tasks" ADD CONSTRAINT FK_50586597166D1F9C FOREIGN KEY (project_id) REFERENCES "projects" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "tasks" DROP CONSTRAINT FK_50586597166D1F9C');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526C8DB60186');
        $this->addSql('ALTER TABLE "files" DROP CONSTRAINT FK_63540598DB60186');
        $this->addSql('ALTER TABLE comment DROP CONSTRAINT FK_9474526CA76ED395');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE "files"');
        $this->addSql('DROP TABLE "projects"');
        $this->addSql('DROP TABLE "roles"');
        $this->addSql('DROP TABLE task_priority');
        $this->addSql('DROP TABLE task_status');
        $this->addSql('DROP TABLE task_type');
        $this->addSql('DROP TABLE "tasks"');
        $this->addSql('DROP TABLE "users"');
    }
}
