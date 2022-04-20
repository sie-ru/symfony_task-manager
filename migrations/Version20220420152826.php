<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220420152826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE comment_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE "comments_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "comments" (id INT NOT NULL, task_id INT DEFAULT NULL, user_id INT DEFAULT NULL, comment_text VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5F9E962A8DB60186 ON "comments" (task_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962AA76ED395 ON "comments" (user_id)');
        $this->addSql('COMMENT ON COLUMN "comments".created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE "comments" ADD CONSTRAINT FK_5F9E962A8DB60186 FOREIGN KEY (task_id) REFERENCES "tasks" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "comments" ADD CONSTRAINT FK_5F9E962AA76ED395 FOREIGN KEY (user_id) REFERENCES "users" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE comment');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "comments_id_seq" CASCADE');
        $this->addSql('CREATE SEQUENCE comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE comment (id INT NOT NULL, task_id INT DEFAULT NULL, user_id INT DEFAULT NULL, comment_text VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_9474526ca76ed395 ON comment (user_id)');
        $this->addSql('CREATE INDEX idx_9474526c8db60186 ON comment (task_id)');
        $this->addSql('COMMENT ON COLUMN comment.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526c8db60186 FOREIGN KEY (task_id) REFERENCES tasks (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT fk_9474526ca76ed395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE "comments"');
    }
}
