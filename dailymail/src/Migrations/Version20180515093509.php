<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180515093509 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trello_configuration (id INT AUTO_INCREMENT NOT NULL, apikey VARCHAR(255) DEFAULT NULL, token VARCHAR(255) DEFAULT NULL, done_column_id VARCHAR(255) DEFAULT NULL, code_review_column_id VARCHAR(255) DEFAULT NULL, pair_testing_column_id VARCHAR(255) DEFAULT NULL, doing_column_id VARCHAR(255) DEFAULT NULL, sprint_column_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_configuration (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, google_configuration_id INT DEFAULT NULL, trello_configuration_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_717332D1166D1F9C (project_id), UNIQUE INDEX UNIQ_717332D1E7A83BB2 (google_configuration_id), UNIQUE INDEX UNIQ_717332D12AC349BE (trello_configuration_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE google_sheet_configuration (id INT AUTO_INCREMENT NOT NULL, token VARCHAR(255) DEFAULT NULL, spread_sheet_id VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_configuration ADD CONSTRAINT FK_717332D1166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project_configuration ADD CONSTRAINT FK_717332D1E7A83BB2 FOREIGN KEY (google_configuration_id) REFERENCES google_sheet_configuration (id)');
        $this->addSql('ALTER TABLE project_configuration ADD CONSTRAINT FK_717332D12AC349BE FOREIGN KEY (trello_configuration_id) REFERENCES trello_configuration (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project_configuration DROP FOREIGN KEY FK_717332D12AC349BE');
        $this->addSql('ALTER TABLE project_configuration DROP FOREIGN KEY FK_717332D1E7A83BB2');
        $this->addSql('DROP TABLE trello_configuration');
        $this->addSql('DROP TABLE project_configuration');
        $this->addSql('DROP TABLE google_sheet_configuration');
    }
}
