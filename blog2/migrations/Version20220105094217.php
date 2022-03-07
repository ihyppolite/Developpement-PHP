<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105094217 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD autor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C14D45BBE FOREIGN KEY (autor_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C14D45BBE ON comment (autor_id)');
        $this->addSql('ALTER TABLE post ADD autor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D14D45BBE FOREIGN KEY (autor_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D14D45BBE ON post (autor_id)');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C14D45BBE');
        $this->addSql('DROP INDEX IDX_9474526C14D45BBE ON comment');
        $this->addSql('ALTER TABLE comment DROP autor_id');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D14D45BBE');
        $this->addSql('DROP INDEX IDX_5A8A6C8D14D45BBE ON post');
        $this->addSql('ALTER TABLE post DROP autor_id');
        $this->addSql('ALTER TABLE user DROP name');
    }
}
