<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180515094131 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project ADD configuration_id INT DEFAULT NULL, DROP trello_key, DROP google_key');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE73F32DD8 FOREIGN KEY (configuration_id) REFERENCES project_configuration (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2FB3D0EE73F32DD8 ON project (configuration_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE73F32DD8');
        $this->addSql('DROP INDEX UNIQ_2FB3D0EE73F32DD8 ON project');
        $this->addSql('ALTER TABLE project ADD trello_key VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD google_key VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP configuration_id');
    }
}
