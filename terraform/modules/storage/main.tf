resource "aws_s3_bucket" "artifacts" {
  bucket = var.bucket_name
  tags = {
    Project     = "WebDienThoai"
    Environment = "CI/CD"
    ManagedBy   = "Terraform"
  }
}

resource "aws_s3_bucket_versioning" "artifacts_versioning" {
  bucket = aws_s3_bucket.artifacts.id
  versioning_configuration {
    status = "Enabled"
  }
}