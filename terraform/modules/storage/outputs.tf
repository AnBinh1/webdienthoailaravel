output "bucket_name" {
  value       = aws_s3_bucket.artifacts.bucket
  description = "Tên S3 bucket"
}