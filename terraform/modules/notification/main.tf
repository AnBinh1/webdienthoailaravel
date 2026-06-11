resource "aws_sns_topic" "deploy_topic" {
  name = var.topic_name
  tags = {
    Project     = "WebDienThoai"
    Environment = "CI/CD"
    ManagedBy   = "Terraform"
  }
}