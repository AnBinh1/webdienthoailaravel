output "s3_bucket_name" {
  value       = module.storage.bucket_name
  description = "Tên S3 bucket lưu artifacts"
}

output "iam_user_name" {
  value       = module.iam.user_name
  description = "Tên IAM user cho CI/CD"
}

output "topic_name" {
  value       = module.notification.topic_name
  description = "Tên SNS topic thông báo deploy"
}